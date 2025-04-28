<?php

namespace App\Enums;

class BarcodeTypes
{
    // This is the ID for the barcode types table
    const CODE128 = 1;
    const AZTEC = 2;
    const EAN13 = 3;
    const EAN8 = 4;
    const QR = 5;
    const PDF417 = 6;
    const UPC_E = 7;
    const DATAMATRIX = 8;
    const CODE39 = 9;
    const CODE93 = 10;
    const ITF14 = 11;
    const CODABAR = 12;
    const UPC_A = 13;

    // TODO: I may not need some of these as I get the ID from Database or either create one.
    /**
     * Get the name of the barcode type by its value. Values from Expo Barcode Scanner.
     *
     * @param  int  $value
     * @return string|null
     */
    public static function getName(int $value): ?string
    {
        $types = [
            self::CODE128 => 'code128',
            self::AZTEC => 'aztec',
            self::EAN13 => 'ean13',
            self::EAN8 => 'ean8',
            self::QR => 'qr',
            self::PDF417 => 'pdf417',
            self::UPC_E => 'upc_e',
            self::DATAMATRIX => 'datamatrix',
            self::CODE39 => 'code39',
            self::CODE93 => 'code93',
            self::ITF14 => 'itf14',
            self::CODABAR => 'codabar',
            self::UPC_A => 'upc_a',
        ];

        return $types[$value] ?? null;
    }

    /**
     * Validate if a value is a valid barcode type.
     *
     * @param  string  $code
     * @return int
     */
    public static function getCode(string $code): int
    {
        $types = [
            'code128' => self::CODE128,
            'aztec' => self::AZTEC,
            'ean13' => self::EAN13,
            'ean8' => self::EAN8,
            'qr' => self::QR,
            'pdf417' => self::PDF417,
            'upc_e' => self::UPC_E,
            'datamatrix' => self::DATAMATRIX,
            'code39' => self::CODE39,
            'code93' => self::CODE93,
            'itf14' => self::ITF14,
            'codabar' => self::CODABAR,
            'upc_a' => self::UPC_A,
        ];

        return $types[$code] ?? 0;

    }

    /**
     * Convert Expo barcode type to Laravel barcode type.
     *
     * @param  string  $expoType
     * @return string|null
     */


    public static function expoToLaravel(string $expoType): ?string
    {
        $expoToLaravel = [
            'code128' => 'C128',
            'ean13' => 'EAN13',
            'ean8' => 'EAN8',
            'upc_e' => 'UPCE',
            'code39' => 'C39',
            'code93' => 'C93',
            'itf14' => 'ITF14',
            'codabar' => 'CODABAR',
            'upc_a' => 'UPCA'
        ];
        return $expoToLaravel[$expoType] ?? null;
    }
}
