<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\Exceptions\UnknownTypeException;

class BarcodeService
{
    /**
     * Generate a barcode image and store it.
     *
     * @param  string  $barcode
     * @param  string  $type
     * @return string|null
     */
    public function generateBarcode(string $barcode, string $type = 'C128'): ?string
    {
        try {
            $generator = new BarcodeGeneratorPNG();
            $barcodeImage = $generator->getBarcode($barcode, $generator::TYPE_CODE_128, 1, 60, [0, 1, 0]);

            // Create an image from the barcode
            $image = imagecreatefromstring($barcodeImage);

            // Get the dimensions of the barcode image
            $imageWidth = imagesx($image);
            $imageHeight = imagesy($image);

            // Create a new image with extra space for the text
            $paddingSide = 10;
            $newImageHeight = $imageHeight + 20; // Add 20px for the text
            $newImageWidth = $imageWidth + $paddingSide * 2; // Add 20px for padding on the sides
            $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);

            // Set background color to transparent
            $white = imagecolorallocate($newImage, 255, 255, 255);
            imagefill($newImage, 0, 0, $white);

            // Copy the barcode image onto the new image
            imagecopy($newImage, $image, $paddingSide, 0, 0, 0, $imageWidth, $imageHeight);

            // Add text below the barcode
            $textColor = imagecolorallocate($newImage, 0, 0, 0); // Black color
            $font = 5; // Built-in font size
            $textX = ($newImageWidth - imagefontwidth($font) * strlen($barcode)) / 2; // Center the text
            $textY = $imageHeight + 5; // Position the text 5px below the barcode
            imagestring($newImage, $font, $textX, $textY, $barcode, $textColor);

            // Save the new image
            ob_start();
            imagepng($newImage);
            $finalImageWithText = ob_get_clean();

            $fileName = 'barcodes/'.$barcode.'-text.png';
            Storage::disk('public')->put($fileName, $finalImageWithText);

            $fileName = 'barcodes/'.$barcode.'.png';
            Storage::disk('public')->put($fileName, $barcodeImage);

            // Clean up
            imagedestroy($image);
            imagedestroy($newImage);
            return Storage::url($fileName);
        } catch (UnknownTypeException $e) {
            Log::error('Barcode generation failed: '.$e->getMessage());
            return null;
        }
    }
}