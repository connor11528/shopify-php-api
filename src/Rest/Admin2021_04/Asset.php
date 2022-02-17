<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $attachment
 * @property string|null $checksum
 * @property string|null $content_type
 * @property string|null $created_at
 * @property string|null $key
 * @property string|null $public_url
 * @property int|null $size
 * @property int|null $theme_id
 * @property string|null $updated_at
 * @property string|null $value
 */
class Asset extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["theme_id"], "path" => "themes/<theme_id>/assets.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["theme_id"], "path" => "themes/<theme_id>/assets.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["theme_id"], "path" => "themes/<theme_id>/assets.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["theme_id"], "path" => "themes/<theme_id>/assets.json"]
    ];
    protected static string $PRIMARY_KEY = "key";

    /**
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     theme_id
     * @param mixed[] $params Allowed indexes:
     *     asset
     *
     * @return RestResponse
     */
    public static function delete(
        Session $session,
        array $otherIds,
        array $params = []
    ): RestResponse {
        return parent::request(
            "delete",
            "delete",
            $session,
            $otherIds,
            $params,
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     theme_id
     * @param mixed[] $params Allowed indexes:
     *     fields,
     *     asset
     *
     * @return Asset[]
     */
    public static function all(
        Session $session,
        array $otherIds,
        array $params = []
    ): array {
        return parent::baseFind(
            $session,
            $otherIds,
            $params,
        );
    }

}
