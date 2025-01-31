<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\PriceTransformer;
use Tests\TestCase;

class PriceTransformerTest extends TestCase {
    public function testPriceTransformerAddsPrice() {
        $inputData = $this->getSampleInputData();
        $transformedData = [];

        $transformer = new PriceTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertEquals('49.99', $output['price']);
        $this->assertEquals('49.99', $output['variants'][0]['price']);
    }
}
