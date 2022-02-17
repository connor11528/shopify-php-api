<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property bool|null $active
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property Country|null $country
 * @property string|null $country_code
 * @property string|null $created_at
 * @property int|null $id
 * @property bool|null $legacy
 * @property string|null $localized_country_name
 * @property string|null $localized_province_name
 * @property string|null $name
 * @property string|null $phone
 * @property Province|null $province
 * @property string|null $province_code
 * @property string|null $updated_at
 * @property string|null $zip
 */
class Location extends Base
{
    protected static array $HAS_ONE = [
        "country" => Country::class,
        "province" => Province::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "locations.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "locations/<id>.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "locations/count.json"],
        ["http_method" => "get", "operation" => "inventory_levels", "ids" => ["id"], "path" => "locations/<id>/inventory_levels.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Location|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Location {
        $result = parent::baseFind(
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Location[]
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

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
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
            [],
            $params,
            [],
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
    public static function inventory_levels(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "inventory_levels",
            $session,
            array_merge(["id" => $id], $otherIds),
            $params,
            [],
        );
    }

}
