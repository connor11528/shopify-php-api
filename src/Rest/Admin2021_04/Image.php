<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $created_at
 * @property int|null $height
 * @property int|null $id
 * @property int|null $position
 * @property int|null $product_id
 * @property string|null $src
 * @property string|null $updated_at
 * @property int[]|null $variant_ids
 * @property int|null $width
 */
class Image extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["product_id"], "path" => "products/<product_id>/images.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["product_id"], "path" => "products/<product_id>/images.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["product_id"], "path" => "products/<product_id>/images/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["product_id", "id"], "path" => "products/<product_id>/images/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["product_id", "id"], "path" => "products/<product_id>/images/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["product_id", "id"], "path" => "products/<product_id>/images/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     product_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Image|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Image {
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
     *     since_id,
     *     fields
     *
     * @return Image[]
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
     * @param mixed[] $params Allowed indexes:
     *     since_id
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
