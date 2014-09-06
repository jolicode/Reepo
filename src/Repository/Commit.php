<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation as Serializer;

class Commit
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $sha;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("html_url")
     * @var string
     */
    protected $url;

    /**
     * @Serializer\Type("Joli\Reepo\Repository\GithubUser")
     * @var \Joli\Reepo\Repository\GithubUser
     */
    protected $author;

    /**
     * @Serializer\Type("Joli\Reepo\Repository\GithubUser")
     * @var \Joli\Reepo\Repository\GithubUser
     */
    protected $committer;
} 