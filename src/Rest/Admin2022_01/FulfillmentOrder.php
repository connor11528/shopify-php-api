<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property array|null $assigned_location
 * @property int|null $assigned_location_id
 * @property array|null $delivery_method
 * @property array|null $destination
 * @property string|null $fulfill_at
 * @property array[]|null $fulfillment_holds
 * @property int|null $id
 * @property array|null $international_duties
 * @property array[]|null $line_items
 * @property array[]|null $merchant_requests
 * @property int|null $order_id
 * @property string|null $request_status
 * @property int|null $shop_id
 * @property string|null $status
 * @property string[]|null $supported_actions
 */
class FulfillmentOrder extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["order_id"], "path" => "orders/<order_id>/fulfillment_orders.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "fulfillment_orders/<id>.json"],
        ["http_method" => "post", "operation" => "cancel", "ids" => ["id"], "path" => "fulfillment_orders/<id>/cancel.json"],
        ["http_method" => "post", "operation" => "close", "ids" => ["id"], "path" => "fulfillment_orders/<id>/close.json"],
        ["http_method" => "post", "operation" => "move", "ids" => ["id"], "path" => "fulfillment_orders/<id>/move.json"],
        ["http_method" => "post", "operation" => "open", "ids" => ["id"], "path" => "fulfillment_orders/<id>/open.json"],
        ["http_method" => "post", "operation" => "reschedule", "ids" => ["id"], "path" => "fulfillment_orders/<id>/reschedule.json"],
        ["http_method" => "post", "operation" => "hold", "ids" => ["id"], "path" => "fulfillment_orders/<id>/hold.json"],
        ["http_method" => "post", "operation" => "release_hold", "ids" => ["id"], "path" => "fulfillment_orders/<id>/release_hold.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return FulfillmentOrder|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): FulfillmentOrder {
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
     * @param mixed[] $params
     *
     * @return FulfillmentOrder[]
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
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     message
     * @param array|string $body
     *
     * @return mixed
     */
    public function close(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "close",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     new_location_id
     * @param array|string $body
     *
     * @return mixed
     */
    public function move(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "move",
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
    public function open(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "open",
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
    public function reschedule(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "reschedule",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     reason,
     *     reason_notes,
     *     notify_merchant
     * @param array|string $body
     *
     * @return mixed
     */
    public function hold(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "hold",
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
    public function release_hold(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "release_hold",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
