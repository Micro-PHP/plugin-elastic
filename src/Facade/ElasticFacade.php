<?php

namespace Micro\Plugin\Elastic\Facade;

use Elastic\Elasticsearch\Client;
use Micro\Plugin\Elastic\Client\Factory\ElasticClientFactoryInterface;
use Micro\Plugin\Elastic\Configuration\ElasticPluginConfigurationInterface;

class ElasticFacade implements ElasticFacadeInterface
{
    /**
     * @param ElasticClientFactoryInterface $elasticClientFactory
     */
    public function __construct(
        private readonly ElasticClientFactoryInterface $elasticClientFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function createClient(string $clientName = ElasticPluginConfigurationInterface::CLIENT_DEFAULT): Client
    {
        return $this->elasticClientFactory->create($clientName);
    }
}