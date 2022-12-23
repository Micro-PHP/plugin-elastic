<?php

namespace Micro\Plugin\Elastic\Configuration;

use Micro\Plugin\Elastic\Configuration\Client\ElasticClientConfigurationInterface;

interface ElasticPluginConfigurationInterface
{
    public const CLIENT_DEFAULT = 'default';

    /**
     * @param string $clientName
     *
     * @return ElasticClientConfigurationInterface
     */
    public function getClientConfiguration(string $clientName = self::CLIENT_DEFAULT): ElasticClientConfigurationInterface;
}