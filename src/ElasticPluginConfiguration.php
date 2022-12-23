<?php

namespace Micro\Plugin\Elastic;

use Micro\Framework\Kernel\Configuration\PluginConfiguration;
use Micro\Plugin\Elastic\Configuration\Client\ElasticClientConfiguration;
use Micro\Plugin\Elastic\Configuration\Client\ElasticClientConfigurationInterface;
use Micro\Plugin\Elastic\Configuration\ElasticPluginConfigurationInterface;

class ElasticPluginConfiguration extends PluginConfiguration implements ElasticPluginConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getClientConfiguration(string $clientName = self::CLIENT_DEFAULT): ElasticClientConfigurationInterface
    {
        return new ElasticClientConfiguration($this->configuration, $clientName);
    }
}