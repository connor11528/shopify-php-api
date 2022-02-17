<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $created_at
 * @property int|null $id
 * @property string|null $name
 * @property bool|null $previewable
 * @property bool|null $processing
 * @property string|null $role
 * @property int|null $theme_store_id
 * @property string|null $updated_at
 */
class Theme extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "themes.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "themes.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "themes/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "themes/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "themes/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Theme|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Theme {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

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
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Theme[]
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
