<?php

namespace Sajjad26\DataTransformer\Transformers;

class ColorTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        if (isset($originalData['variants'])) {
            foreach ($originalData['variants'] as $index => $variant) {
                if (isset($variant['color'])) {
                    $transformedData['variants'][$index]['option1'] = $variant['color']['en'] ?? '';
                    $transformedData['variants'][$index]['metafields'][] = [
                        'namespace' => 'variant',
                        'key' => 'color',
                        'value' => json_encode($variant['color']),
                        'type' => 'json'
                    ];
                }
            }
        }
        return $transformedData;
    }
}
