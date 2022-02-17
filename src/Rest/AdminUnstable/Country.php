<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $code
 * @property int|null $id
 * @property string|null $name
 * @property Province[]|null $provinces
 * @property float|null $tax
 */
class Country extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [
        "provinces" => Province::class
    ];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "countries.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "countries.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "countries/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "countries/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "countries/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "countries/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Country|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Country {
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
     *     since_id,
     *     fields
     *
     * @return Country[]
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
