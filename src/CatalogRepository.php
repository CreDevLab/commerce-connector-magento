<?php

namespace Credevlab\CommerceConnector\Magento;


use Credevlab\CommerceConnector\Magento\Catalog\ProductRepository;

class CatalogRepository
{
    protected $_productRepository;

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


}