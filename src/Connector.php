<?php

namespace Credevlab\CommerceConnector\Magento;

use GuzzleHttp\Client;

class Connector extends \Credevlab\CommerceConnector\Connector
{

    public function createConnection(){
        $client = new Client([
            'base_uri' => $this->getBaseUrl(),
            'headers' => [
                'cache-control' => 'no-cache',
                'authorization' => 'Bearer '.$this->getToken(),
                'content-type' => 'application/json'
            ]]);
        $this->setConnection($client);
    }

    /**
     * @return mixed
     */
    public function getCatalogRepository()
    {
        if(!$this->_catalogRepository){
            $this->_catalogRepository = new CatalogRepository($this->getConnection());
        }
        return $this->_catalogRepository;
    }
}