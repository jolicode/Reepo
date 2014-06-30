<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation\Type;

class GithubRepository extends Repository
{
    /**
     * @Type("string")
     * @var string
     */
    protected $defaultBranch;

    /**
     * @Type("Joli\Reepo\Repository\GithubUser")
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
