<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $admin_graphql_api_id
 * @property string|null $callback_url
 * @property string|null $format
 * @property bool|null $fulfillment_orders_opt_in
 * @property string|null $handle
 * @property int|null $id
 * @property bool|null $inventory_management
 * @property int|null $location_id
 * @property string|null $name
 * @property string|null $provider_id
 * @property bool|null $requires_shipping_method
 * @property bool|null $tracking_support
 */
class FulfillmentService extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "fulfillment_services.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "fulfillment_services.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "fulfillment_services/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "fulfillment_services/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "fulfillment_services/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return FulfillmentService|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): FulfillmentService {
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
     *     scope
     *
     * @return FulfillmentService[]
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
