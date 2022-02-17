<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $allocation_limit
 * @property string|null $allocation_method
 * @property string|null $created_at
 * @property string|null $customer_selection
 * @property string|null $ends_at
 * @property int[]|null $entitled_collection_ids
 * @property int[]|null $entitled_country_ids
 * @property int[]|null $entitled_product_ids
 * @property int[]|null $entitled_variant_ids
 * @property int|null $id
 * @property bool|null $once_per_customer
 * @property int[]|null $prerequisite_collection_ids
 * @property int[]|null $prerequisite_customer_ids
 * @property int[]|null $prerequisite_product_ids
 * @property array|null $prerequisite_quantity_range
 * @property int[]|null $prerequisite_saved_search_ids
 * @property array|null $prerequisite_shipping_price_range
 * @property array|null $prerequisite_subtotal_range
 * @property array|null $prerequisite_to_entitlement_purchase
 * @property array|null $prerequisite_to_entitlement_quantity_ratio
 * @property int[]|null $prerequisite_variant_ids
 * @property string|null $starts_at
 * @property string|null $target_selection
 * @property string|null $target_type
 * @property string|null $title
 * @property string|null $updated_at
 * @property int|null $usage_limit
 * @property string|null $value
 * @property string|null $value_type
 */
class PriceRule extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "price_rules.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "price_rules.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "price_rules/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "price_rules/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "price_rules/<id>.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "price_rules/count.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return PriceRule|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): PriceRule {
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
     *     limit,
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     starts_at_min,
     *     starts_at_max,
     *     ends_at_min,
     *     ends_at_max,
     *     times_used
     *
     * @return PriceRule[]
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

}
