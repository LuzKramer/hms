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
}

