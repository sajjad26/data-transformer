<?php

namespace Tests\Transformers;

use Sajjad26\DataTransformer\Transformers\ClusterTransformer;
use Tests\TestCase;

class ClusterTransformerTest extends TestCase {
    public function testClusterTransformerAddsMetafield() {
        $inputData = $this->getSampleInputData();
        $transformedData = [];

        $transformer = new ClusterTransformer();
        $output = $transformer->transform($inputData, $transformedData);

        $this->assertArrayHasKey('metafields', $output);
        $this->assertContains([
            'namespace' => 'product',
            'key' => 'cluster',
            'value' => 'Luxury Leather Wallets',
            'type' => 'string'
        ], $output['metafields']);
    }
}
