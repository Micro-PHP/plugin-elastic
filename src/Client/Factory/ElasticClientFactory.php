<?php

namespace Micro\Plugin\Elastic\Client\Factory;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Micro\Plugin\Elastic\Configuration\ElasticPluginConfigurationInterface;
use Micro\Plugin\Logger\LoggerFacadeInterface;

class ElasticClientFactory implements ElasticClientFactoryInterface
{
    /**
     * @param ElasticPluginConfigurationInterface $pluginConfiguration
     * @param LoggerFacadeInterface $loggerFacade
     */
    public function __construct(
        private readonly ElasticPluginConfigurationInterface $pluginConfiguration,
        private readonly LoggerFacadeInterface $loggerFacade
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $clientName): Client
    {
        $clientConfiguration = $this->pluginConfiguration->getClientConfiguration($clientName);
        $builder = ClientBuilder::create()->setHosts($clientConfiguration->getHosts());

        $basicLogin = $clientConfiguration->getBasicAuthLogin();
        if($basicLogin) {
            $builder->setBasicAuthentication($basicLogin, $clientConfiguration->getBasicAuthPassword());
        }

        $apiKey = $clientConfiguration->getApiKey();
        if($apiKey) {
            $builder->setApiKey($apiKey);
        }

        $elasticCloudId = $clientConfiguration->getElasticCloudId();
        if($elasticCloudId) {
            $builder->setElasticCloudId($elasticCloudId);
        }

        $logger = $this->loggerFacade->getLogger($clientConfiguration->getLoggerName());

        $builder->setLogger($logger);
        $builder->setRetries($clientConfiguration->getRetries());
        $builder->setSSLVerification($clientConfiguration->getSslVerification());

        $caBundle = $clientConfiguration->getCABundle();
        if($caBundle) {
            $builder->setCABundle($caBundle);
        }

        $sslKey = $clientConfiguration->getSslKey();
        if($sslKey) {
            $builder->setSSLKey($sslKey, $clientConfiguration->getSslKeyPassword());
        }

        return $builder->build();
    }
}