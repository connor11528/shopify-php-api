<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $key
 * @property string $namespace
 * @property array $value
 * @property string|null $created_at
 * @property string|null $description
 * @property int|null $id
 * @property int|null $owner_id
 * @property string|null $owner_resource
 * @property string|null $type
 * @property string|null $updated_at
 * @property string|null $value_type
 */
class Metafield extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "metafields.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "metafields.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "metafields.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "metafields/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "metafields/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "metafields/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "metafields/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Metafield|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Metafield {
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
     *     limit,
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     namespace,
     *     key,
     *     type,
     *     value_type,
     *     fields,
     *     metafield
     *
     * @return Metafield[]
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

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return mixed
     */
    public static function count(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "count",
            $session,
            [],
            $params,
            [],
        );
    }

}
