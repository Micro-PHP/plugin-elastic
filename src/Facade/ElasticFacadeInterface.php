<?php

namespace Micro\Plugin\Elastic\Facade;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\AuthenticationException;
use Micro\Plugin\Elastic\Configuration\ElasticPluginConfigurationInterface;

interface ElasticFacadeInterface
{
    /**
     * @param string $clientName
     *
     * @return Client
     *
     * @throws AuthenticationException
     */
    public function createClient(string $clientName = ElasticPluginConfigurationInterface::CLIENT_DEFAULT): Client;
}