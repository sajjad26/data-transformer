<?php

namespace Sajjad26\DataTransformer;

use Sajjad26\DataTransformer\Transformers\TransformerInterface;

class MainTransformer {
    private array $data;
    private array $transformers = [];

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function addTransformer(TransformerInterface $transformer): void {
        $this->transformers[] = $transformer;
    }

    public function transform(): array {
        $transformedData = $this->data;

        foreach ($this->transformers as $transformer) {
            $transformedData = $transformer->transform($this->data, $transformedData);
        }

        return $transformedData;
    }
}
