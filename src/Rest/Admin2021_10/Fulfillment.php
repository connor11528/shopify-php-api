<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $created_at
 * @property int|null $id
 * @property array[]|null $line_items
 * @property int|null $location_id
 * @property string|null $name
 * @property bool|null $notify_customer
 * @property int|null $order_id
 * @property array[]|null $origin_address
 * @property array|null $receipt
 * @property string|null $service
 * @property string|null $shipment_status
 * @property string|null $status
 * @property string|null $tracking_company
 * @property string[]|null $tracking_numbers
 * @property string[]|null $tracking_urls
 * @property string|null $updated_at
 * @property string|null $variant_inventory_management
 */
class Fulfillment extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id"], "path" => "orders/<order_id>/fulfillments.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["order_id"], "path" => "orders/<order_id>/fulfillments.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["fulfillment_order_id"], "path" => "fulfillment_orders/<fulfillment_order_id>/fulfillments.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["order_id"], "path" => "orders/<order_id>/fulfillments/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/fulfillments/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/fulfillments/<id>.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "fulfillments.json"],
        ["http_method" => "post", "operation" => "update_tracking", "ids" => ["id"], "path" => "fulfillments/<id>/update_tracking.json"],
        ["http_method" => "post", "operation" => "complete", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/fulfillments/<id>/complete.json"],
        ["http_method" => "post", "operation" => "open", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/fulfillments/<id>/open.json"],
        ["http_method" => "post", "operation" => "cancel", "ids" => ["order_id", "id"], "path" => "orders/<order_id>/fulfillments/<id>/cancel.json"],
        ["http_method" => "post", "operation" => "cancel", "ids" => ["id"], "path" => "fulfillments/<id>/cancel.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     order_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Fulfillment|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Fulfillment {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     order_id
     *     fulfillment_order_id
     * @param mixed[] $params Allowed indexes:
     *     created_at_max,
     *     created_at_min,
     *     fields,
     *     limit,
     *     since_id,
     *     updated_at_max,
     *     updated_at_min
     *
     * @return Fulfillment[]
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

    /**
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     order_id
     * @param mixed[] $params Allowed indexes:
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max
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
            $otherIds,
            $params,
            [],
        );
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function update_tracking(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "update_tracking",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function complete(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "complete",
            $this->session,
            ["order_id" => $this->order_id, "id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function open(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "open",
            $this->session,
            ["order_id" => $this->order_id, "id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function cancel(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "cancel",
            $this->session,
            ["order_id" => $this->order_id, "id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
