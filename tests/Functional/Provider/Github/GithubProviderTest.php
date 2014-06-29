<?php

namespace Joli\Reepo\Tests\Provider\Github;

use GuzzleHttp\Client;
use Joli\Reepo\Provider\Github\GithubProvider;

class GithubProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRepositories()
    {
        $provider     = new GithubProvider();
        $repositories = $provider->getRepositories(array('user' => 'symfony', 'type' => 'organization'));

        $this->assertGreaterThan(0, count($repositories));
        $this->assertInstanceOf('Joli\Reepo\Repository\GitRepository', $repositories[0]);
    }

    public function testGetRepository()
    {
        $provider     = new GithubProvider();
        $symfonyRepository = $provider->getRepository(array('owner' => 'symfony', 'repo' => 'symfony'));

        $this->assertInstanceOf('Joli\Reepo\Repository\GitRepository', $symfonyRepository);
    }
} 