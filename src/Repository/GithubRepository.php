<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation as Serializer;

class GithubRepository extends Repository
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $defaultBranch;

    /**
     * @Serializer\Type("Joli\Reepo\Repository\GithubUser")
     * @var \Joli\Reepo\Repository\GithubUser
     */
    protected $owner;

    /**
     * Return owner of repository
     *
     * @return GithubUser
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
