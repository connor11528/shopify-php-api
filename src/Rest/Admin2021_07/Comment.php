<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $article_id
 * @property string|null $author
 * @property int|null $blog_id
 * @property string|null $body
 * @property string|null $body_html
 * @property string|null $created_at
 * @property string|null $email
 * @property int|null $id
 * @property string|null $ip
 * @property string|null $published_at
 * @property string|null $status
 * @property string|null $updated_at
 * @property string|null $user_agent
 */
class Comment extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "comments.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "comments/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "comments/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "comments/<id>.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "comments.json"],
        ["http_method" => "post", "operation" => "spam", "ids" => ["id"], "path" => "comments/<id>/spam.json"],
        ["http_method" => "post", "operation" => "not_spam", "ids" => ["id"], "path" => "comments/<id>/not_spam.json"],
        ["http_method" => "post", "operation" => "approve", "ids" => ["id"], "path" => "comments/<id>/approve.json"],
        ["http_method" => "post", "operation" => "remove", "ids" => ["id"], "path" => "comments/<id>/remove.json"],
        ["http_method" => "post", "operation" => "restore", "ids" => ["id"], "path" => "comments/<id>/restore.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Comment|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Comment {
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
     * @param mixed[] $params Allowed indexes:
     *     limit,
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     fields,
     *     published_status,
     *     status
     *
     * @return Comment[]
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
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     published_at_min,
     *     published_at_max,
     *     published_status,
     *     status
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
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function spam(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "spam",
            $this->session,
            ["id" => $this->id],
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
    public function not_spam(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "not_spam",
            $this->session,
            ["id" => $this->id],
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
    public function approve(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "approve",
            $this->session,
            ["id" => $this->id],
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
    public function remove(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "remove",
            $this->session,
            ["id" => $this->id],
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
    public function restore(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "restore",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
