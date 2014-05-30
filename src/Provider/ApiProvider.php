<?php

namespace Joli\Reepo\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class ApiProvider
{
    /** @var \GuzzleHttp\Command\Guzzle\GuzzleClient Service client */
    protected $client;

    public function __construct(array $options = array())
    {
        $client          = new Client();
        $optionsResolver = new OptionsResolver();

        $this->configureClientOptions($optionsResolver);

        $description = $this->getDescription($optionsResolver->resolve($options));

        $this->client = new GuzzleClient($client, $description);
    }

    /**
     * Return an api description for a provider
     *
     * @param  array $options A list of options to configure this provider
     *
     * @return \GuzzleHttp\Command\Guzzle\Description api client description
     */
    abstract protected function getDescription(array $options = array());

    /**
     * Configure default options to validate parameters in description
     *
     * @param OptionsResolverInterface $options Option object
     */
    abstract protected function configureClientOptions(OptionsResolverInterface $options);
}