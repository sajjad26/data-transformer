<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\SKUTransformer;
use Tests\TestCase;

class SKUTransformerTest extends TestCase {
    public function testSKUTransformerGeneratesCorrectSKU() {
        $inputData = $this->getSampleInputData();
        $transformedData = [];

        $transformer = new SKUTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertEquals('ABC123', $output['sku']);
        $this->assertEquals('ABC123-1', $output['variants'][0]['sku']);
    }
}
