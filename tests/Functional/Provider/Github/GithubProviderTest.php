<?php

namespace Joli\Reepo\Tests\Provider\Github;

use GuzzleHttp\Client;
use Joli\Reepo\Provider\Github\GithubProvider;

class GithubProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRepositories()
    {
        $provider     = new GithubProvider(array('user' => 'symfony'));
        $repositories = $provider->getRepositories();

        $this->assertGreaterThan(0, count($repositories));
        $this->assertInstanceOf('Joli\Reepo\Repository\GitRepository', $repositories[0]);
    }
} 