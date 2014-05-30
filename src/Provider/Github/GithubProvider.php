<?php
/**
 * Created by PhpStorm.
 * User: brouznouf
 * Date: 30/05/2014
 * Time: 14:29
 */

namespace Joli\Reepo\Provider\Github;

use GuzzleHttp\Command\Guzzle\Description;
use Joli\Reepo\Provider\ApiProvider;
use Joli\Reepo\Provider\AuthenticationInterface;
use Joli\Reepo\Provider\Commit;
use Joli\Reepo\Provider\ProviderInterface;
use Joli\Reepo\Provider\WebhookInterface;
use Joli\Reepo\Repository\Repository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GithubProvider extends ApiProvider implements ProviderInterface, AuthenticationInterface, WebhookInterface
{
    const WEBHOOK_EVENT_PUSH         = "push";
    const WEBHOOK_EVENT_PULL_REQUEST = "pull_request";

    /**
     * {@inheritDoc}
     */
    public function getRepositories(array $filters = array())
    {
        return $this->client->getRepositories();
    }

    /**
     * {@inheritDoc}
     */
    public function getRepository($identifier)
    {
        // TODO: Implement getRepository() method.
    }

    /**
     * {@inheritDoc}
     */
    public function getCommits(Repository $repository, array $filters = array())
    {
        // TODO: Implement getCommits() method.
    }

    /**
     * {@inheritDoc}
     */
    public function checkoutCommit(Commit $commit, $destination)
    {
        // TODO: Implement checkoutCommit() method.
    }

    /**
     * {@inheritDoc}
     */
    public function registerAuthentication(Repository $repository)
    {
        // TODO: Implement registerAuthentication() method.
    }

    /**
     * {@inheritDoc}
     */
    public function registerWebhook(Repository $repository, $webhookUrl, $event)
    {
        // TODO: Implement registerWebhook() method.
    }

    /**
     * {@inheritDoc}
     */
    protected function getDescription(array $options = array())
    {
        return new Description([
            'baseUrl' => $options['base_url'],
            'operations' => [
                'getRepositories' => [
                    'httpMethod' => 'GET',
                    'uri' => '/users/'.$options['user'].'/repos',
                    'responseModel' => 'getResponse'
                ]
            ],
            'models' => [
                'getResponse' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ]
            ]
        ]);
    }

    /**
     * {@inheritDoc}
     */
    protected function configureClientOptions(OptionsResolverInterface $options)
    {
        $options->setDefaults(array(
            'base_url' => 'https://api.github.com',
        ));

        $options->setRequired(array(
            'user'
        ));
    }
} 