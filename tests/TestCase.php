<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {
    protected function getSampleInputData(): array {
        return [
            'product_id' => 'ABC123',
            'title' => [
                'en' => 'Premium Leather Wallet',
                'de' => 'Premium-Leder Geldbörse',
                'fr' => 'Portefeuille en cuir de luxe'
            ],
            'sku' => 'ABC123',
            'price' => 49.99,
            'cluster' => 'Luxury Leather Wallets',
            'attributes' => [
                'size' => ['en' => 'Medium', 'de' => 'Mittel', 'fr' => 'Moyen']
            ],
            'variants' => [
                [
                    'variant_id' => 'ABC123-1',
                    'color' => ['en' => 'Black', 'de' => 'Schwarz', 'fr' => 'Noir'],
                    'price' => 49.99
                ]
            ]
        ];
    }
}
