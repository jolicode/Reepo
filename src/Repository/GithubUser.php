<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation\Type;

class GithubUser
{
    /**
     * @Type("integer")
     * @var integer
     */
    protected $id;

    /**
     * @Type("string")
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