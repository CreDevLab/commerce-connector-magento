<?php

namespace Credevlab\CommerceConnector\Magento\Catalog;

use Credevlab\CommerceConnector\Catalog\Api\ProductRepositoryInterface;
use Credevlab\CommerceConnector\AbstractRepository;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface{


    public  function get($sku, $editMode = false, $forceReload = false)
    {
        // TODO: Implement get() method.
        $client = $this->getConnection();
        $response = $client->request("GET", "rest/V1/products/".$sku);
        if($response->getStatusCode() == 200){
            $product = json_decode($response->getBody(), true);
            if(!empty($product['custom_attributes'])){
                foreach($product['custom_attributes'] as $attribute){
                    $product[$attribute['attribute_code']] = $attribute['value'];
                }
                unset($product['custom_attributes']);
            }
            return [$product];
        }
        else{
            return ["message" => "Error occured", "status_code" => $response->getStatusCode()];
        }
    }

    public function getList(\Credevlab\CommerceConnector\Catalog\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}