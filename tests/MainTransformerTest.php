<?php

namespace Tests\Transformers;

use Tests\TestCase;
use Sajjad26\DataTransformer\MainTransformer;
use Sajjad26\DataTransformer\Transformers\ClusterTransformer;
use Sajjad26\DataTransformer\Transformers\TitleTransformer;
use Sajjad26\DataTransformer\Transformers\SKUTransformer;

class MainTransformerTest extends TestCase {
    public function testMainTransformerAppliesTransformersInSequence() {
        $inputData = $this->getSampleInputData();
        $mainTransformer = new MainTransformer($inputData);

        $mainTransformer->addTransformer(new ClusterTransformer());
        $mainTransformer->addTransformer(new TitleTransformer());
        $mainTransformer->addTransformer(new SKUTransformer());

        $output = $mainTransformer->transform();

        $this->assertArrayHasKey('metafields', $output);
        $this->assertContains([
            'namespace' => 'product',
            'key' => 'cluster',
            'value' => 'Luxury Leather Wallets',
            'type' => 'string'
        ], $output['metafields']);

        $this->assertArrayHasKey('title', $output);
        $this->assertEquals('Premium Leather Wallet', $output['title']);

        $this->assertArrayHasKey('sku', $output);
        $this->assertEquals('ABC123', $output['sku']);

        $this->assertArrayHasKey('variants', $output);
        $this->assertEquals('ABC123-1', $output['variants'][0]['sku']);
    }
}
