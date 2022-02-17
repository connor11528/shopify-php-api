<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $category
 * @property int|null $id
 * @property string|null $name
 * @property string|null $shopify_ql
 * @property string|null $updated_at
 */
class Report extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "reports.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "reports.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "reports/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "reports/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "reports/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Report|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Report {
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
     *     ids,
     *     limit,
     *     since_id,
     *     updated_at_min,
     *     updated_at_max,
     *     fields
     *
     * @return Report[]
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
