<?php
/**
 * Created by PhpStorm.
 * User: aman.srivastava
 * Date: 13/02/18
 * Time: 1:20 PM
 */

namespace Credevlab\CommerceConnector\Magento\Catalog;


use Credevlab\CommerceConnector\AbstractRepository;
use Credevlab\CommerceConnector\Catalog\Api\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{

    public function get($categoryId)
    {
        try {
            $client = $this->getConnection();
            $response = $client->request("GET", "rest/V1/categories/" . $categoryId . "?storeId=1");
            if ($response->getStatusCode() == 200) {
                $category = json_decode($response->getBody(), true);

                return $category;
            } else {
                return ["message" => "Error occured", "status_code" => $response->getStatusCode()];
            }
        }
        catch (\Exception $e) {
            return ["message" => "Error occured", "status_code" => 500];
        }
    }

    public function getTree()
    {
        // TODO: Implement getTree() method.
    }

    public function getProducts($categoryId){
        try {
            $client = $this->getConnection();
            $response = $client->request("GET", "rest/V1/categories/" . $categoryId . "/products");
            if ($response->getStatusCode() == 200) {
                $products = json_decode($response->getBody(), true);

                return $products;
            } else {
                return ["message" => "Error occured", "status_code" => $response->getStatusCode()];
            }
        }
        catch (\Exception $e) {
            return ["message" => "Error occured", "status_code" => 500];
        }
    }

}