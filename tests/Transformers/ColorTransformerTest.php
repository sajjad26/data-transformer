<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\ColorTransformer;
use Tests\TestCase;

class ColorTransformerTest extends TestCase {
    public function testColorTransformerAddsMetafield() {
        $inputData = $this->getSampleInputData();
        $transformedData = ['variants' => [[]]];

        $transformer = new ColorTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertEquals('Black', $output['variants'][0]['option1']);
        $this->assertContains([
            'namespace' => 'variant',
            'key' => 'color',
            'value' => json_encode($inputData['variants'][0]['color']),
            'type' => 'json'
        ], $output['variants'][0]['metafields']);
    }
}
