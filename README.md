# Data Transformer

## Overview
This package transforms product and variant data into a Shopify-compatible format. It supports multiple languages (English, German, French) and allows flexible transformations using a modular transformer system.

## Installation
Since this package is hosted on GitHub, you need to add it as a repository manually in your project.

### **1️⃣ Modify `composer.json`**
Add the following under the `repositories` section:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/sajjad26/data-transformer"
    }
]
```

### **2️⃣ Require the Package**
Run the following command to install it:
```sh
composer require sajjad26/data-transformer:dev-main
```

If you've tagged a release (e.g., `v1.0.0`), use:
```sh
composer require sajjad26/data-transformer:^1.0
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

## Creating Custom Transformers
If you need to apply additional transformations, you can create your own transformer by implementing the `TransformerInterface`.

### **Example: Custom Transformer**
```php
namespace Your\Application\Transformers;

class CustomTransformer implements TransformerInterface {
    public function transform(array $originalData, array $transformedData): array {
        // Custom transformation logic here
        $transformedData['custom_field'] = strtoupper($originalData['custom_field'] ?? '');
        return $transformedData;
    }
}
```

To use your custom transformer, simply add it to the `MainTransformer`:
```php
$transformer->addTransformer(new CustomTransformer());
```

## License
This package is open-source and available under the MIT License.

