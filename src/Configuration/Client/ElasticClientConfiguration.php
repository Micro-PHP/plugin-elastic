<?php

namespace Micro\Plugin\Elastic\Configuration\Client;

use Micro\Framework\Kernel\Configuration\PluginRoutingKeyConfiguration;
use Micro\Plugin\Logger\LoggerFacadeInterface;

class ElasticClientConfiguration extends PluginRoutingKeyConfiguration implements ElasticClientConfigurationInterface
{
    const CFG_CLIENT_HOSTS          = 'MICRO_ELASTIC_%s_HOSTS';
    const CFG_CLIENT_LOGGER         = 'MICRO_ELASTIC_%s_LOGGER';
    const CFG_CLIENT_RETRIES        = 'MICRO_ELASTIC_%s_RETRIES';
    const CFG_CLIENT_SSL_VERIFY     = 'MICRO_ELASTIC_%s_SSL_VERIFY';
    const CFG_CLIENT_SSL_KEY        = 'MICRO_ELASTIC_%s_SSL_KEY';
    const CFG_CLIENT_SSL_KEY_PWD    = 'MICRO_ELASTIC_%s_SSL_KEY_PASSWORD';
    const CFG_CLIENT_API_KEY        = 'MICRO_ELASTIC_%s_API_KEY';
    const CFG_CLIENT_BA_LOGIN       = 'MICRO_ELASTIC_%s_AUTH_BASIC_LOGIN';
    const CFG_CLIENT_BA_PWD         = 'MICRO_ELASTIC_%s_AUTH_BASIC_PASSWORD';
    const CFG_CLIENT_CLOUD_ID       = 'MICRO_ELASTIC_%s_CLOUD_ID';
    const CFG_CLIENT_CA_BUNDLE      = 'MICRO_ELASTIC_%s_CA_BUNDLE';

    /**
     * {@inheritDoc}
     */
    public function getHosts(): array
    {
        $hosts = $this->get(self::CFG_CLIENT_HOSTS, 'localhost:9200', false);

        return $this->explodeStringToArray($hosts);
    }

    /**
     * {@inheritDoc}
     */
    public function getLoggerName(): string
    {
        return $this->get(self::CFG_CLIENT_LOGGER, LoggerFacadeInterface::LOGGER_DEFAULT, false);
    }

    /**
     * {@inheritDoc}
     */
    public function getRetries(): int
    {
        return (int) $this->get(self::CFG_CLIENT_RETRIES, 1, false);
    }

    /**
     * {@inheritDoc}
     */
    public function getSslVerification(): bool
    {
        return (bool) $this->get(self::CFG_CLIENT_SSL_VERIFY, true, false);
    }

    /**
     * {@inheritDoc}
     */
    public function getSslKey(): string|null
    {
        return $this->get(self::CFG_CLIENT_SSL_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function getSslKeyPassword(): string|null
    {
        return $this->get(self::CFG_CLIENT_SSL_KEY_PWD);
    }

    /**
     * {@inheritDoc}
     */
    public function getApiKey(): string|null
    {
        return $this->get(self::CFG_CLIENT_API_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function getBasicAuthLogin(): string|null
    {
        return $this->get(self::CFG_CLIENT_BA_LOGIN);
    }

    /**
     * {@inheritDoc}
     */
    public function getBasicAuthPassword(): string|null
    {
        return $this->get(self::CFG_CLIENT_BA_PWD);
    }

    /**
     * {@inheritDoc}
     */
    public function getElasticCloudId(): string|null
    {
        return $this->get(self::CFG_CLIENT_CLOUD_ID);
    }

    /**
     * {@inheritDoc}
     */
    public function getCABundle(): string|null
    {
        return $this->get(self::CFG_CLIENT_CA_BUNDLE);
    }
}