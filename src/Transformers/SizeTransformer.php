<?php

namespace Sajjad26\DataTransformer\Transformers;

class SizeTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        if (isset($originalData['attributes']['size'])) {
            foreach ($originalData['variants'] as $index => $variant) {
                $transformedData['variants'][$index]['option2'] = $originalData['attributes']['size']['en'] ?? '';
                $transformedData['variants'][$index]['metafields'][] = [
                    'namespace' => 'variant',
                    'key' => 'size',
                    'value' => json_encode($originalData['attributes']['size']),
                    'type' => 'json'
                ];
            }
        }
        return $transformedData;
    }
}
