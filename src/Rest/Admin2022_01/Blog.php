<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $admin_graphql_api_id
 * @property string|null $commentable
 * @property string|null $created_at
 * @property string|null $feedburner
 * @property string|null $feedburner_location
 * @property string|null $handle
 * @property int|null $id
 * @property Metafield[]|null $metafields
 * @property string|null $tags
 * @property string|null $template_suffix
 * @property string|null $title
 * @property string|null $updated_at
 */
class Blog extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [
        "metafields" => Metafield::class
    ];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "blogs.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "blogs.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "blogs/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "blogs/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "blogs/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "blogs/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Blog|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Blog {
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
     *     handle,
     *     fields
     *
     * @return Blog[]
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
