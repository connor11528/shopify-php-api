<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property bool|null $active
 * @property string|null $admin_graphql_api_id
 * @property string|null $callback_url
 * @property string|null $carrier_service_type
 * @property string|null $format
 * @property int|null $id
 * @property string|null $name
 * @property bool|null $service_discovery
 */
class CarrierService extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "carrier_services.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "carrier_services.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "carrier_services/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "carrier_services/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "carrier_services/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return CarrierService|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): CarrierService {
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
     * @param mixed[] $params
     *
     * @return CarrierService[]
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
