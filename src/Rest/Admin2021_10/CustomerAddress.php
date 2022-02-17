<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $company
 * @property string|null $country
 * @property string|null $country_code
 * @property string|null $country_name
 * @property int|null $customer_id
 * @property string|null $first_name
 * @property int|null $id
 * @property string|null $last_name
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $province
 * @property string|null $province_code
 * @property string|null $zip
 */
class CustomerAddress extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["customer_id"], "path" => "customers/<customer_id>/addresses.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["customer_id"], "path" => "customers/<customer_id>/addresses.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["customer_id", "id"], "path" => "customers/<customer_id>/addresses/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["customer_id", "id"], "path" => "customers/<customer_id>/addresses/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["customer_id", "id"], "path" => "customers/<customer_id>/addresses/<id>.json"],
        ["http_method" => "put", "operation" => "set", "ids" => ["customer_id"], "path" => "customers/<customer_id>/addresses/set.json"],
        ["http_method" => "put", "operation" => "default", "ids" => ["customer_id", "id"], "path" => "customers/<customer_id>/addresses/<id>/default.json"]
    ];

    /**

     *
     * @return string
     */
    protected static function getJsonBodyName(): string
    {
        return "address";
    }

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     customer_id
     * @param mixed[] $params
     *
     * @return CustomerAddress|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): CustomerAddress {
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
     *     customer_id
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
     *     customer_id
     * @param mixed[] $params
     *
     * @return CustomerAddress[]
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
     * @param mixed[] $params Allowed indexes:
     *     address_ids,
     *     operation
     * @param array|string $body
     *
     * @return mixed
     */
    public function set(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "put",
            "set",
            $this->session,
            ["customer_id" => $this->customer_id],
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
    public function default(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "put",
            "default",
            $this->session,
            ["customer_id" => $this->customer_id, "id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
