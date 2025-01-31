<?php

namespace Sajjad26\DataTransformer\Transformers;

class PriceTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        $transformedData['price'] = number_format($originalData['price'] ?? 0, 2, '.', '');

        if (isset($originalData['variants'])) {
            foreach ($originalData['variants'] as $index => $variant) {
                $transformedData['variants'][$index]['price'] = number_format($variant['price'] ?? 0, 2, '.', '');
            }
        }
        return $transformedData;
    }
}
