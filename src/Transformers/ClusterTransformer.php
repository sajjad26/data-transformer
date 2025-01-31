<?php

namespace Sajjad26\DataTransformer\Transformers;

class ClusterTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        if (isset($originalData['cluster'])) {
            $transformedData['metafields'][] = [
                'namespace' => 'product',
                'key' => 'cluster',
                'value' => $originalData['cluster'],
                'type' => 'string'
            ];
        }
        return $transformedData;
    }
}
