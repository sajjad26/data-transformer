# Data Transformer

## Overview
This package transforms product and variant data into a Shopify-compatible format. It supports multiple languages (English, German, French) and allows flexible transformations using a modular transformer system.

## Installation
If published on Packagist, install via Composer:
```sh
composer require sajjad26/data-transformer
```

For local development, add the repository manually in `composer.json`:
```json
"repositories": [
    {
        "type": "path",
        "url": "../data-transformer"
    }
]
```
Then install:
```sh
composer require sajjad26/data-transformer --dev
```

## Usage
### Load the Package
Include the autoloader:
```php
require 'vendor/autoload.php';
```

### Transforming Data
```php
use Sajjad26\DataTransformer\MainTransformer;
use Sajjad26\DataTransformer\Transformers\ClusterTransformer;
use Sajjad26\DataTransformer\Transformers\TitleTransformer;
use Sajjad26\DataTransformer\Transformers\SKUTransformer;
use Sajjad26\DataTransformer\Transformers\ColorTransformer;
use Sajjad26\DataTransformer\Transformers\SizeTransformer;
use Sajjad26\DataTransformer\Transformers\PriceTransformer;
use Sajjad26\DataTransformer\Transformers\DimensionsTransformer;

$inputData = [
    "product_id" => "ABC123",
    "title" => [
        "en" => "Premium Leather Wallet",
        "de" => "Premium-Leder Geldbörse",
        "fr" => "Portefeuille en cuir de luxe"
    ],
    "sku" => "ABC123",
    "price" => 49.99,
    "cluster" => "Luxury Leather Wallets",
    "attributes" => [
        "size" => ["en" => "Medium", "de" => "Mittel", "fr" => "Moyen"]
    ],
    "variants" => [
        [
            "variant_id" => "ABC123-1",
            "color" => ["en" => "Black", "de" => "Schwarz", "fr" => "Noir"],
            "price" => 49.99
        ]
    ]
];

$transformer = new MainTransformer($inputData);
$transformer->addTransformer(new ClusterTransformer());
$transformer->addTransformer(new TitleTransformer());
$transformer->addTransformer(new SKUTransformer());
$transformer->addTransformer(new ColorTransformer());
$transformer->addTransformer(new SizeTransformer());
$transformer->addTransformer(new PriceTransformer());
$transformer->addTransformer(new DimensionsTransformer());

$transformedData = $transformer->transform();
print_r($transformedData);
```

## Running Tests
```sh
vendor/bin/phpunit
```

## License
This package is open-source and available under the MIT License.

