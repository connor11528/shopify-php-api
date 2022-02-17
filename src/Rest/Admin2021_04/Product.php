<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $title
 * @property string|null $body_html
 * @property string|null $created_at
 * @property string|null $handle
 * @property int|null $id
 * @property Image[]|null $images
 * @property array|null $options
 * @property string|null $product_type
 * @property string|null $published_at
 * @property string|null $published_scope
 * @property string|null $status
 * @property string|null $tags
 * @property string|null $template_suffix
 * @property string|null $updated_at
 * @property Variant[]|null $variants
 * @property string|null $vendor
 */
class Product extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [
        "images" => Image::class,
        "variants" => Variant::class
    ];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "products.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "products.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "products/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "products/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "products/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "products/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Product|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Product {
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
     *     ids,
     *     limit,
     *     since_id,
     *     title,
     *     vendor,
     *     handle,
     *     product_type,
     *     status,
     *     collection_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status,
     *     fields,
     *     presentment_currencies
     *
     * @return Product[]
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
     * @param mixed[] $params Allowed indexes:
     *     vendor,
     *     product_type,
     *     collection_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status
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
