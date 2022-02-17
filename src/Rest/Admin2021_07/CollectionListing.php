<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $body_html
 * @property int|null $collection_id
 * @property array[]|null $default_product_image
 * @property string|null $handle
 * @property Image|null $image
 * @property string|null $published_at
 * @property string|null $sort_order
 * @property string|null $title
 * @property string|null $updated_at
 */
class CollectionListing extends Base
{
    protected static array $HAS_ONE = [
        "image" => Image::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "collection_listings.json"],
        ["http_method" => "get", "operation" => "product_ids", "ids" => ["collection_id"], "path" => "collection_listings/<collection_id>/product_ids.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["collection_id"], "path" => "collection_listings/<collection_id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["collection_id"], "path" => "collection_listings/<collection_id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["collection_id"], "path" => "collection_listings/<collection_id>.json"]
    ];
    protected static string $PRIMARY_KEY = "collection_id";

    /**
     * @param Session $session
     * @param int|string $collection_id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return CollectionListing|null
     */
    public static function find(
        Session $session,
        $collection_id,
        array $otherIds,
        array $params = []
    ): CollectionListing {
        $result = parent::baseFind(
            $session,
            array_merge(["collection_id" => $collection_id], $otherIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param int|string $collection_id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return RestResponse
     */
    public static function delete(
        Session $session,
        $collection_id,
        array $otherIds,
        array $params = []
    ): RestResponse {
        return parent::request(
            "delete",
            "delete",
            $session,
            array_merge(["collection_id" => $collection_id], $otherIds),
            $params,
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     limit
     *
     * @return CollectionListing[]
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
     * @param int|string $collection_id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     limit
     *
     * @return mixed
     */
    public static function product_ids(
        Session $session,
        $collection_id,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "product_ids",
            $session,
            array_merge(["collection_id" => $collection_id], $otherIds),
            $params,
            [],
        );
    }

}
