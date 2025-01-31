<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\TitleTransformer;
use Tests\TestCase;

class TitleTransformerTest extends TestCase {
    public function testTitleTransformerAddsMetafield() {
        $inputData = $this->getSampleInputData();
        $transformedData = [];

        $transformer = new TitleTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertArrayHasKey('title', $output);
        $this->assertEquals('Premium Leather Wallet', $output['title']);
        $this->assertContains([
            'namespace' => 'product',
            'key' => 'title',
            'value' => json_encode($inputData['title']),
            'type' => 'json'
        ], $output['metafields']);
    }
}
