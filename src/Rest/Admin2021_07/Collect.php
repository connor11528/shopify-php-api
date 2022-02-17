<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $collection_id
 * @property string|null $created_at
 * @property int|null $id
 * @property int|null $position
 * @property int|null $product_id
 * @property string|null $sort_value
 * @property string|null $updated_at
 */
class Collect extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "collects.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "collects.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "collects/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "collects/<id>.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "collects/count.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Collect|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Collect {
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
     *     fields
     *
     * @return Collect[]
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
