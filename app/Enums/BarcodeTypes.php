<?php

namespace App\Enums;

class BarcodeTypes
{
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

    /**
     * Get the name of the barcode type by its value.
     *
     * @param int $value
     * @return string|null
     */
    public static function getName(int $value): ?string
    {
        $types = [
            self::CODE128 => 'CODE128',
            self::AZTEC => 'AZTEC',
            self::EAN13 => 'EAN13',
            self::EAN8 => 'EAN8',
            self::QR => 'QR',
            self::PDF417 => 'PDF417',
            self::UPC_E => 'UPC_E',
            self::DATAMATRIX => 'DATAMATRIX',
            self::CODE39 => 'CODE39',
            self::CODE93 => 'CODE93',
            self::ITF14 => 'ITF14',
            self::CODABAR => 'CODABAR',
            self::UPC_A => 'UPC_A',
        ];

        return $types[$value] ?? null;
    }

    /**
     * Validate if a value is a valid barcode type.
     *
     * @param int $value
     * @return bool
     */
    public static function isValid(int $value): bool
    {
        return in_array($value, [
            self::CODE128,
            self::AZTEC,
            self::EAN13,
            self::EAN8,
            self::QR,
            self::PDF417,
            self::UPC_E,
            self::DATAMATRIX,
            self::CODE39,
            self::CODE93,
            self::ITF14,
            self::CODABAR,
            self::UPC_A,
        ], true);
    }
}
