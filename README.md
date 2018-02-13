# commerce-connector-magento
Commerce Connector for Magento 2

### How to use
```php
use Credevlab\CommerceConnector\Magento\Connector as MagentoConnector; // include this class
...
$connection = new MagentoConnector(['base_url' => 'http://magento2.local/', 'token' => "xxxxxxxxxxxxxx"]); //Replace inputs
$pr = $connection->getCatalogRepository()->getProductRepository();
$product = $pr->get($sku);
```

Reference: http://devdocs.magento.com/guides/v2.0/get-started/authentication/gs-authentication-token.html