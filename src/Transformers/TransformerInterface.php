<?php

namespace Sajjad26\DataTransformer\Transformers;

interface TransformerInterface {
    public function transform(array $originalData, array $transformedData): array;
}