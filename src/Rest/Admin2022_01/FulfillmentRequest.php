<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $fulfillment_order_id
 */
class FulfillmentRequest extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => ["fulfillment_order_id"], "path" => "fulfillment_orders/<fulfillment_order_id>/fulfillment_request.json"],
        ["http_method" => "post", "operation" => "accept", "ids" => ["fulfillment_order_id"], "path" => "fulfillment_orders/<fulfillment_order_id>/fulfillment_request/accept.json"],
        ["http_method" => "post", "operation" => "reject", "ids" => ["fulfillment_order_id"], "path" => "fulfillment_orders/<fulfillment_order_id>/fulfillment_request/reject.json"]
    ];

    /**
     * @param mixed[] $params Allowed indexes:
     *     message
     * @param array|string $body
     *
     * @return mixed
     */
    public function accept(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "accept",
            $this->session,
            ["fulfillment_order_id" => $this->fulfillment_order_id],
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
    public function reject(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "reject",
            $this->session,
            ["fulfillment_order_id" => $this->fulfillment_order_id],
            $params,
            $body,
            $this,
        );
    }

}
