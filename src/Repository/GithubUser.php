<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation as Serializer;

class GithubUser
{
    /**
     * @Serializer\Type("integer")
     * @var integer
     */
    protected $id;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $login;

    /**
     * Return login name of user
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }
} 