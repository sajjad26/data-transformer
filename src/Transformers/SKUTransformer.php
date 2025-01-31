<?php

namespace Sajjad26\DataTransformer\Transformers;

class SKUTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        $transformedData['id'] = $originalData['product_id'] ?? '';
        $transformedData['sku'] = $originalData['sku'] ?? '';

        if (isset($originalData['variants'])) {
            foreach ($originalData['variants'] as $index => $variant) {
                $transformedData['variants'][$index]['id'] = $variant['variant_id'] ?? '';
                $transformedData['variants'][$index]['sku'] = $originalData['sku'] . '-' . ($index + 1);
            }
        }
        return $transformedData;
    }
}
