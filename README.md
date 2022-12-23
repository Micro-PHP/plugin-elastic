
# Micro Framework Elasticsearch plugin

MicroFramework component for using elasticsearch.
## Installation

Install plugin with composer

```bash
$ composer require micro/plugin-elastic
```

Аnd then add plugin to the list of plugins (etc/plugins.php)

```php

$pluginsCommon = [
    //....OTHER PLUGINS ....
    Micro\Plugin\Elastic\ElasticPlugin::class,
];

```
Configure your elasticsearch providers

The adapter configuration template usually looks like this `MICRO_ELASTIC_<PROVIDER_NAME>_<PROVIDER_SETTING>`

Default  adapter name "default"


```dotenv
MICRO_ELASTIC_DEFAULT_HOSTS=http://localhost:9200
MICRO_ELASTIC_DEFAULT_LOGGER=default
```


## Usage/Examples

Index document

```php
/** @var Elastic\Elasticsearch\ClientInterface $client */
$client = $container->get(ElasticFacadeInterface::class);

$parameters = [
    'index' => 'index',
    'body'  => [ 'foo' => 'bar' ],
    'id'    => 'foo_id',
];

$client->index($parameters);
```

More examples for working with the library can be found in the official ElasticSearch library [documentation](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/operations.html).



## Support

For support, email head.trackingsoft@gmail.com.

Pull requests are very welcome.


## Authors

- [@stanislau_komar](https://www.github.com/asisyas)


## License

[MIT](LICENSE)

