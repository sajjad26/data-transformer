<?php

namespace Sajjad26\DataTransformer\Transformers;

class TitleTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        if (isset($originalData['title'])) {
            $transformedData['title'] = $originalData['title']['en'] ?? '';
            $transformedData['metafields'][] = [
                'namespace' => 'product',
                'key' => 'title',
                'value' => json_encode($originalData['title']),
                'type' => 'json'
            ];
        }
        return $transformedData;
    }
}
