<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $attachment
 * @property string|null $created_at
 * @property string|null $credential1
 * @property string|null $credential2
 * @property string|null $credential3
 * @property string|null $credential4
 * @property bool|null $disabled
 * @property string[]|null $enabled_card_brands
 * @property int|null $id
 * @property string|null $name
 * @property string|null $processing_method
 * @property int|null $provider_id
 * @property bool|null $sandbox
 * @property string|null $service_name
 * @property bool|null $supports_network_tokenization
 * @property string|null $type
 * @property string|null $updated_at
 */
class PaymentGateway extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "payment_gateways.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "payment_gateways.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "payment_gateways/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "payment_gateways/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "payment_gateways/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return PaymentGateway|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): PaymentGateway {
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
     * @return PaymentGateway[]
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
