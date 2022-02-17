<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property array $rules
 * @property string $title
 * @property string|null $body_html
 * @property bool|null $disjunctive
 * @property string|null $handle
 * @property int|null $id
 * @property array|null $image
 * @property string|null $published_at
 * @property string|null $published_scope
 * @property string|null $sort_order
 * @property string|null $template_suffix
 * @property string|null $updated_at
 */
class SmartCollection extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "smart_collections.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "smart_collections.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "smart_collections/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "smart_collections/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "smart_collections/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "smart_collections/<id>.json"],
        ["http_method" => "put", "operation" => "order", "ids" => ["id"], "path" => "smart_collections/<id>/order.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return SmartCollection|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): SmartCollection {
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
     *     ids,
     *     since_id,
     *     title,
     *     product_id,
     *     handle,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status,
     *     fields
     *
     * @return SmartCollection[]
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
     *     title,
     *     product_id,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status
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
     * @param mixed[] $params Allowed indexes:
     *     products,
     *     sort_order
     * @param array|string $body
     *
     * @return mixed
     */
    public function order(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "put",
            "order",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
