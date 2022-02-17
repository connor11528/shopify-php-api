<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $created_at
 * @property int|null $id
 * @property string|null $name
 * @property string|null $query
 * @property string|null $updated_at
 */
class CustomerSavedSearch extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "customer_saved_searches.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "customer_saved_searches.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "customer_saved_searches/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "customer_saved_searches/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "customer_saved_searches/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "customer_saved_searches/<id>.json"],
        ["http_method" => "get", "operation" => "customers", "ids" => ["id"], "path" => "customer_saved_searches/<id>/customers.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return CustomerSavedSearch|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): CustomerSavedSearch {
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
     * @return CustomerSavedSearch[]
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
     * @param mixed[] $params Allowed indexes:
     *     since_id
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

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     order,
     *     limit,
     *     fields
     *
     * @return mixed
     */
    public static function customers(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "customers",
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
            [],
        );
    }

}
