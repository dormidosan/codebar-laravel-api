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
            $fileName = 'barcodes/'.$barcode.'.png';
            Storage::disk('public')->put($fileName, $barcodeImage);
            return Storage::url($fileName);
        } catch (UnknownTypeException $e) {
            Log::error('Barcode generation failed: '.$e->getMessage());
            return null;
        }
    }
}