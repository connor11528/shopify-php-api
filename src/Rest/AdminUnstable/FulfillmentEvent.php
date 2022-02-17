<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $address1
 * @property string|null $city
 * @property Country|null $country
 * @property string|null $created_at
 * @property string|null $estimated_delivery_at
 * @property int|null $fulfillment_id
 * @property string|null $happened_at
 * @property int|null $id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $message
 * @property int|null $order_id
 * @property Province|null $province
 * @property int|null $shop_id
 * @property string|null $status
 * @property string|null $updated_at
 * @property string|null $zip
 */
class FulfillmentEvent extends Base
{
    protected static array $HAS_ONE = [
        "country" => Country::class,
        "province" => Province::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id", "fulfillment_id"], "path" => "orders/<order_id>/fulfillments/<fulfillment_id>/events.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["order_id", "fulfillment_id"], "path" => "orders/<order_id>/fulfillments/<fulfillment_id>/events.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id", "fulfillment_id", "id"], "path" => "orders/<order_id>/fulfillments/<fulfillment_id>/events/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["order_id", "fulfillment_id", "id"], "path" => "orders/<order_id>/fulfillments/<fulfillment_id>/events/<id>.json"]
    ];

    /**

     *
     * @return string
     */
    protected static function getJsonBodyName(): string
    {
        return "event";
    }

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     order_id
     *     fulfillment_id
     * @param mixed[] $params Allowed indexes:
     *     event_id
     *
     * @return FulfillmentEvent|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): FulfillmentEvent {
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
     *     fulfillment_id
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
     *     fulfillment_id
     * @param mixed[] $params
     *
     * @return FulfillmentEvent[]
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
