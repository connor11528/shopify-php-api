<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $id
 * @property string|null $merchant_id
 * @property string|null $status
 */
class ApplePayCertificate extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "apple_pay_certificates.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "apple_pay_certificates/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "apple_pay_certificates/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "apple_pay_certificates/<id>.json"],
        ["http_method" => "get", "operation" => "csr", "ids" => ["id"], "path" => "apple_pay_certificates/<id>/csr.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return ApplePayCertificate|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): ApplePayCertificate {
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
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return mixed
     */
    public static function csr(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "csr",
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
            [],
        );
    }

}
