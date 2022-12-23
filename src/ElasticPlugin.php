<?php

namespace Micro\Plugin\Elastic;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Elastic\Client\Factory\ElasticClientFactory;
use Micro\Plugin\Elastic\Client\Factory\ElasticClientFactoryInterface;
use Micro\Plugin\Elastic\Configuration\ElasticPluginConfigurationInterface;
use Micro\Plugin\Elastic\Facade\ElasticFacade;
use Micro\Plugin\Elastic\Facade\ElasticFacadeInterface;
use Micro\Plugin\Logger\LoggerFacadeInterface;

/**
 * @method ElasticPluginConfigurationInterface configuration()
 */
class ElasticPlugin extends AbstractPlugin
{
    /**
     * @var LoggerFacadeInterface
     */
    private readonly LoggerFacadeInterface $loggerFacade;

    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(ElasticFacadeInterface::class, function (
            LoggerFacadeInterface $loggerFacade
        ) {
            $this->loggerFacade = $loggerFacade;

            return $this->createFacade();
        });
    }

    /**
     * @return ElasticClientFactoryInterface
     */
    public function createElasticClientFactory(): ElasticClientFactoryInterface
    {
        return new ElasticClientFactory(
            $this->configuration(),
            $this->loggerFacade
        );
    }

    /**
     * @return ElasticFacadeInterface
     */
    public function createFacade(): ElasticFacadeInterface
    {
        return new ElasticFacade(
            $this->createElasticClientFactory()
        );
    }
}