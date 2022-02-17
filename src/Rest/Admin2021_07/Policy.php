<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $body
 * @property string|null $created_at
 * @property string|null $handle
 * @property string|null $title
 * @property string|null $updated_at
 * @property string|null $url
 */
class Policy extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "policies.json"]
    ];

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Policy[]
     */
    public static function all(
        Session $session,
        array $otherIds,
        array $params = []
    ): array {
        return parent::baseFind(
            $session,
            [],
            $params,
        );
    }

}
