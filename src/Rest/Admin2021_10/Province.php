<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $code
 * @property int|null $country_id
 * @property int|null $id
 * @property string|null $name
 * @property int|null $shipping_zone_id
 * @property float|null $tax
 * @property string|null $tax_name
 * @property float|null $tax_percentage
 * @property string|null $tax_type
 */
class Province extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["country_id"], "path" => "countries/<country_id>/provinces.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["country_id"], "path" => "countries/<country_id>/provinces/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["country_id", "id"], "path" => "countries/<country_id>/provinces/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["country_id", "id"], "path" => "countries/<country_id>/provinces/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     country_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Province|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Province {
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
     *     country_id
     * @param mixed[] $params Allowed indexes:
     *     since_id,
     *     fields
     *
     * @return Province[]
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
     *     country_id
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
            $otherIds,
            $params,
            [],
        );
    }

}
