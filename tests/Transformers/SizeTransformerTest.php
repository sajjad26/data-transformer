<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\SizeTransformer;
use Tests\TestCase;

class SizeTransformerTest extends TestCase {
    public function testSizeTransformerAddsMetafield() {
        $inputData = $this->getSampleInputData();
        $transformedData = ['variants' => [[]]];

        $transformer = new SizeTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertEquals('Medium', $output['variants'][0]['option2']);
        $this->assertContains([
            'namespace' => 'variant',
            'key' => 'size',
            'value' => json_encode($inputData['attributes']['size']),
            'type' => 'json'
        ], $output['variants'][0]['metafields']);
    }
}
