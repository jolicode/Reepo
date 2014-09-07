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
use Joli\Reepo\Repository\GithubRepository;
use Joli\Reepo\Repository\Repository;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
        $optionResolver = new OptionsResolver();

        $this->configureGetRepositoriesOptions($optionResolver);
        $options = $optionResolver->resolve($filters);

        if ($options['type'] == 'organization') {
            return $this->client->getOrgsRepositories(array(
                'user' => $options['user']
            ));
        }

        return $this->client->getRepositories(array(
            'user' => $options['user']
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function getRepository($options)
    {
        return $this->client->getRepository($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommits(Repository $repository, array $filters = array())
    {
        if (!$repository instanceof GithubRepository) {
            throw new \UnexpectedValueException(sprintf("Repository must be an instance of GithubRepository, %s given", get_class($repository)));
        }

        return $this->client->getCommits(array(
            'owner' => $repository->getOwner()->getLogin(),
            'repo'  => $repository->getName()
        ));
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
                'getUserRepositories' => [
                    'httpMethod'      => 'GET',
                    'uri'             => '/users/{user}/repos',
                    'serializer_type' => 'array<Joli\Reepo\Repository\GithubRepository>',
                    'parameters' => [
                        'user' => ['type' => 'string', 'location' => 'uri', 'required' => true],
                    ]
                ],
                'getOrgsRepositories' => [
                    'httpMethod'      => 'GET',
                    'uri'             => '/orgs/{user}/repos',
                    'serializer_type' => 'array<Joli\Reepo\Repository\GithubRepository>',
                    'parameters' => [
                        'user' => ['type' => 'string', 'location' => 'uri', 'required' => true],
                    ]
                ],
                'getRepository' => [
                    'httpMethod'      => 'GET',
                    'uri'             => '/repos/{owner}/{repo}',
                    'serializer_type' => 'Joli\Reepo\Repository\GithubRepository',
                    'parameters' => [
                        'owner' => ['type' => 'string', 'location' => 'uri', 'required' => true],
                        'repo'  => ['type' => 'string', 'location' => 'uri', 'required' => true],
                    ]
                ],
                'getCommits' => [
                    'httpMethod'      => 'GET',
                    'uri'             => '/repos/{owner}/{repo}/commits',
                    'serializer_type' => 'array<Joli\Reepo\Repository\Commit>',
                    'parameters' => [
                        'owner' => ['type' => 'string', 'location' => 'uri', 'required' => true],
                        'repo'  => ['type' => 'string', 'location' => 'uri', 'required' => true],
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
    }

    /**
     * {@inheritDoc}
     */
    protected function configureGetRepositoriesOptions(OptionsResolverInterface $options)
    {
        $options->setDefaults(array(
            'type' => 'user'
        ));

        $options->setRequired(array('user'));
    }
} 