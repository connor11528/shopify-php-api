<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property bool|null $cause_cancel
 * @property int|null $checkout_id
 * @property bool|null $display
 * @property int|null $id
 * @property string|null $merchant_message
 * @property string|null $message
 * @property int|null $order_id
 * @property string|null $recommendation
 * @property float|null $score
 * @property string|null $source
 */
class OrderRisk extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => ["order_id"], "path" => "orders/<order_id>/risks.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id"], "path" => "orders/<order_id>/risks.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/risks/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/risks/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/risks/<id>.json"]
    ];

    /**

     *
     * @return string
     */
    protected static function getJsonBodyName(): string
    {
        return "risk";
    }

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     order_id
     * @param mixed[] $params
     *
     * @return OrderRisk|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): OrderRisk {
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
     * @param array $otherIds Allowed indexes:
     *     order_id
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
     * @param array $otherIds Allowed indexes:
     *     order_id
     * @param mixed[] $params
     *
     * @return OrderRisk[]
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
