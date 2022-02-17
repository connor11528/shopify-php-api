<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $title
 * @property AccessScope|null $access_scope
 * @property string|null $access_token
 * @property string|null $created_at
 * @property int|null $id
 */
class StorefrontAccessToken extends Base
{
    protected static array $HAS_ONE = [
        "access_scope" => AccessScope::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "storefront_access_tokens.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "storefront_access_tokens.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "storefront_access_tokens/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return RestResponse
     */
    public static function delete(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): RestResponse {
        return parent::request(
            "delete",
            "delete",
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return StorefrontAccessToken[]
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
