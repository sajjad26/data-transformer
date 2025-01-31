<?php

namespace Sajjad26\DataTransformer\Transformers;

class DimensionsTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        if (isset($originalData['variants'])) {
            foreach ($originalData['variants'] as $index => $variant) {
                if (isset($variant['dimensions'])) {
                    $transformedData['variants'][$index]['metafields'][] = [
                        'namespace' => 'variant',
                        'key' => 'dimensions',
                        'value' => json_encode($variant['dimensions']),
                        'type' => 'json'
                    ];
                }
            }
        }
        return $transformedData;
    }
}
