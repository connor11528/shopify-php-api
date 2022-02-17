<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property bool|null $account_owner
 * @property string|null $bio
 * @property string|null $email
 * @property string|null $first_name
 * @property int|null $id
 * @property string|null $im
 * @property string|null $last_name
 * @property string|null $locale
 * @property string[]|null $permissions
 * @property string|null $phone
 * @property int|null $receive_announcements
 * @property string|null $screen_name
 * @property string|null $url
 * @property string|null $user_type
 */
class User extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "users.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "users/<id>.json"],
        ["http_method" => "get", "operation" => "current", "ids" => [], "path" => "users/current.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return User|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): User {
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
     *     page_info
     *
     * @return User[]
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
    public static function current(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "current",
            $session,
            [],
            $params,
            [],
        );
    }

}
