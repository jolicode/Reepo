<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation as Serializer;

abstract class Repository
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
    protected $name;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $description;

    /**
     * Return name of repository
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
