<?php

namespace Joli\Reepo\Repository;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Commit
{
    /**
     * @Type("string")
     * @var string
     */
    protected $sha;

    /**
     * @Type("string")
     * @SerializedName("html_url")
     * @var string
     */
    protected $url;

    /**
     * @Type("Joli\Reepo\Repository\GithubUser")
     * @var \Joli\Reepo\Repository\GithubUser
     */
    protected $author;

    /**
     * @Type("Joli\Reepo\Repository\GithubUser")
     * @var \Joli\Reepo\Repository\GithubUser
     */
    protected $committer;
} 