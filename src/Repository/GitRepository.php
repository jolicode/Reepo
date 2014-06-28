<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation\Type;

class GitRepository extends Repository
{
    /**
     * @Type("string")
     * @var string
     */
    protected $default_branch;
}
