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

        var_dump($repositories[0]);
    }
} 