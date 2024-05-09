<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeService
{
    public function generateQRCode($text)
    {
        // Generate QR code with provided text
        $qrCode = QrCode::generate($text);
        
        return $qrCode;
    }
}
