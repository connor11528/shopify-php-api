<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $author
 * @property int|null $blog_id
 * @property string|null $body_html
 * @property string|null $created_at
 * @property string|null $handle
 * @property int|null $id
 * @property array|null $image
 * @property Metafield[]|null $metafields
 * @property bool|null $published
 * @property string|null $published_at
 * @property string|null $summary_html
 * @property string|null $tags
 * @property string|null $template_suffix
 * @property string|null $title
 * @property string|null $updated_at
 * @property int|null $user_id
 */
class Article extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [
        "metafields" => Metafield::class
    ];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => ["blog_id"], "path" => "blogs/<blog_id>/articles.json"],
        ["http_method" => "post", "operation" => "post", "ids" => ["blog_id"], "path" => "blogs/<blog_id>/articles.json"],
        ["http_method" => "get", "operation" => "count", "ids" => ["blog_id"], "path" => "blogs/<blog_id>/articles/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["blog_id", "id"], "path" => "blogs/<blog_id>/articles/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["blog_id", "id"], "path" => "blogs/<blog_id>/articles/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["blog_id", "id"], "path" => "blogs/<blog_id>/articles/<id>.json"],
        ["http_method" => "get", "operation" => "authors", "ids" => [], "path" => "articles/authors.json"],
        ["http_method" => "get", "operation" => "tags", "ids" => ["blog_id"], "path" => "blogs/<blog_id>/articles/tags.json"],
        ["http_method" => "get", "operation" => "tags", "ids" => [], "path" => "articles/tags.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     blog_id
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Article|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Article {
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
     *     blog_id
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
     *     blog_id
     * @param mixed[] $params Allowed indexes:
     *     limit,
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status,
     *     handle,
     *     tag,
     *     author,
     *     fields
     *
     * @return Article[]
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
     *     blog_id
     * @param mixed[] $params Allowed indexes:
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
            $otherIds,
            $params,
            [],
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return mixed
     */
    public static function authors(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "authors",
            $session,
            [],
            $params,
            [],
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     blog_id
     * @param mixed[] $params Allowed indexes:
     *     limit,
     *     popular
     *
     * @return mixed
     */
    public static function tags(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "tags",
            $session,
            $otherIds,
            $params,
            [],
        );
    }

}
