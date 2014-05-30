<?php

namespace Joli\Reepo\Provider;

use Joli\Reepo\Repository\Repository;

interface ProviderInterface
{
    /**
     * Get all repositories available for this provider
     *
     * @param array $filters Filters to use when getting repositories
     *
     * @return Repository[] All projects available
     */
    public function getRepositories(array $filters = array());

    /**
     * Get a specific repository for this provider
     *
     * @param mixed $identifier Identifier to know which repository to get
     *
     * @return Repository Return the new project
     */
    public function getRepository($identifier);

    /**
     * Get commits for a repository
     *
     * @param Repository $repository Repository from which it retrieve commits
     * @param array      $filters    Filters to use when getting commits
     *
     * @return Commit[] Commits for this repository
     */
    public function getCommits(Repository $repository, array $filters = array());

    /**
     * Checkout a commit into destination
     *
     * @param Commit $commit      Commit to checkout
     * @param string $destination Destination folder of checkout (which must exist)
     *
     * @return boolean Whether the checkout is a success
     */
    public function checkoutCommit(Commit $commit, $destination);
}
