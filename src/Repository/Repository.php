<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation\Type;

abstract class Repository
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
    protected $name;

    /**
     * @Type("string")
     * @var string
     */
    protected $description;
}
