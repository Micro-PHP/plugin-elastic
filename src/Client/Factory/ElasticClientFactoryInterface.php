<?php

namespace Micro\Plugin\Elastic\Client\Factory;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\AuthenticationException;

interface ElasticClientFactoryInterface
{
    /**
     * @param string $clientName
     *
     * @return Client
     *
     * @throws AuthenticationException
     */
    public function create(string $clientName): Client;
}