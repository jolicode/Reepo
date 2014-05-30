<?php

namespace Joli\Reepo\Provider;

use Joli\Reepo\Repository\Repository;

/**
 * Add webhook features to a provider
 *
 * @author Joel Wurtz <jwurtz@jolicode.com>
 */
interface WebhookInterface
{
    /**
     * Register the webhook for a repository
     *
     * @param Repository $repository  Repository on which we register the webhook
     * @param string     $webhookUrl  Url called for a webhook on this repository
     * @param int        $event       Event used to call the webhook
     */
    public function registerWebhook(Repository $repository, $webhookUrl, $event);
}
