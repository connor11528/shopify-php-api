<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $barcode
 * @property string|null $compare_at_price
 * @property string|null $created_at
 * @property string|null $fulfillment_service
 * @property int|null $grams
 * @property int|null $id
 * @property int|null $image_id
 * @property int|null $inventory_item_id
 * @property string|null $inventory_management
 * @property string|null $inventory_policy
 * @property int|null $inventory_quantity
 * @property int|null $inventory_quantity_adjustment
 * @property int|null $old_inventory_quantity
 * @property array|null $option
 * @property int|null $position
 * @property array[]|null $presentment_prices
 * @property string|null $price
 * @property int|null $product_id
 * @property bool|null $requires_shipping
 * @property string|null $sku
 * @property string|null $tax_code
 * @property bool|null $taxable
 * @property string|null $title
 * @property string|null $updated_at
 * @property int|null $weight
 * @property string|null $weight_unit
 */
class Variant extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["product_id"], "path" => "products/<product_id>/variants.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["product_id"], "path" => "products/<product_id>/variants/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "variants/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "variants/<id>.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["product_id"], "path" => "products/<product_id>/variants.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["product_id", "id"], "path" => "products/<product_id>/variants/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Variant|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Variant {
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
     *     product_id
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
     *     product_id
     * @param mixed[] $params Allowed indexes:
     *     limit,
     *     presentment_currencies,
     *     since_id,
     *     fields
     *
     * @return Variant[]
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
     *     product_id
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
