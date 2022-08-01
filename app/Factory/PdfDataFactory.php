<?php 

namespace App\Factory;

class PdfDataFactory {

    private string $format;

    public function __construct($format)
    {
        $this->format = $format;
    }

    

}

?>