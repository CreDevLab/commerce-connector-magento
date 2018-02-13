<?php

namespace Credevlab\CommerceConnector\Magento;

use Credevlab\CommerceConnector\Magento\Catalog\CategoryRepository;
use Credevlab\CommerceConnector\Magento\Catalog\ProductRepository;
use Credevlab\CommerceConnector\Catalog\Api\CatalogRepositoryInterface;

class CatalogRepository implements CatalogRepositoryInterface
{
    protected $_productRepository;

    protected $_categoryRepository;

    protected $_connection;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->setConnection($client);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getConnection()
    {
        return $this->_connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection(\GuzzleHttp\Client $connection)
    {
        $this->_connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getProductRepository()
    {
        if(!$this->_productRepository){
            $this->_productRepository = new ProductRepository($this->getConnection());
        }
        return $this->_productRepository;
    }

    /**
     * @return mixed
     */
    public function getCategoryRepository()
    {
        if(!$this->_categoryRepository){
            $this->_categoryRepository = new CategoryRepository($this->getConnection());
        }
        return $this->_categoryRepository;
    }

}