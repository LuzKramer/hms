<?php

namespace App\Services;

use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;

class GeminiService
{
    public function diagnostico()
    {
        $promt = "You gonna make a summary list with only the probables
         causes of the symptoms without explain the each one causes and
          gonna give me the response in Portuguese.";


        $result = Gemini::geminiPro()->generateContent([$promt]);

        return $result->text();


    }
    public function hasConnection()
    {
        try {
            // Attempt to make a simple HTTP request to a known external website
            $response = file_get_contents('https://www.google.com');

            // If we get a response, the internet connection is likely working
            return true;
        } catch (\Exception $e) {
            // If an exception occurs, it's likely that there's no internet connection
            return false;
        }
    }
}

