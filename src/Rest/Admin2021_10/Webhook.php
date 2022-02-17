<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $address
 * @property string $topic
 * @property string|null $api_version
 * @property string|null $created_at
 * @property string[]|null $fields
 * @property string|null $format
 * @property int|null $id
 * @property string[]|null $metafield_namespaces
 * @property string[]|null $private_metafield_namespaces
 * @property string|null $updated_at
 */
class Webhook extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "webhooks.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "webhooks.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "webhooks/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "webhooks/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "webhooks/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "webhooks/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return Webhook|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Webhook {
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
     *     address,
     *     created_at_max,
     *     created_at_min,
     *     fields,
     *     limit,
     *     since_id,
     *     topic,
     *     updated_at_min,
     *     updated_at_max
     *
     * @return Webhook[]
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
     *     address,
     *     topic
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
