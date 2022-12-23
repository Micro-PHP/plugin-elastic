<?php

namespace Micro\Plugin\Elastic\Configuration\Client;

interface ElasticClientConfigurationInterface
{
    /**
     * Example: localhostL9200,elastic:9200
     *
     * @return string[]
     */
    public function getHosts(): array;

    /**
     * @return string
     */
    public function getLoggerName(): string;

    /**
     * @return int
     */
    public function getRetries(): int;

    /**
     * @return bool
     */
    public function getSslVerification(): bool;

    /**
     * The name of a file containing a private SSL key
     *
     * @return string|null
     */
    public function getSslKey(): string|null;

    /**
     * If the private key requires a password
     *
     * @return string|null
     */
    public function getSslKeyPassword(): string|null;

    /**
     * @return string|null
     */
    public function getApiKey(): string|null;

    /**
     * @return string|null
     */
    public function getBasicAuthLogin(): string|null;

    /**
     * @return string|null
     */
    public function getBasicAuthPassword(): string|null;

    /**
     * @return string|null
     */
    public function getElasticCloudId(): string|null;

    /**
     * The name of a file containing a PEM formatted certificate
     *
     * @return string|null
     */
    public function getCABundle(): string|null;
}