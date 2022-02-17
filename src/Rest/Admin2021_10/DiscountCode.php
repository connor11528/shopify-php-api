<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $code
 * @property string|null $created_at
 * @property int|null $id
 * @property int|null $price_rule_id
 * @property string|null $updated_at
 * @property int|null $usage_count
 */
class DiscountCode extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => ["price_rule_id"], "path" => "price_rules/<price_rule_id>/discount_codes.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["price_rule_id"], "path" => "price_rules/<price_rule_id>/discount_codes.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["price_rule_id", "id"], "path" => "price_rules/<price_rule_id>/discount_codes/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["price_rule_id", "id"], "path" => "price_rules/<price_rule_id>/discount_codes/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["price_rule_id", "id"], "path" => "price_rules/<price_rule_id>/discount_codes/<id>.json"],
        ["http_method" => "get", "operation" => "lookup", "ids" => [], "path" => "discount_codes/lookup.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "discount_codes/count.json"],
        ["http_method" => "post", "operation" => "batch", "ids" => ["price_rule_id"], "path" => "price_rules/<price_rule_id>/batch.json"],
        ["http_method" => "get", "operation" => "get_all", "ids" => ["price_rule_id", "batch_id"], "path" => "price_rules/<price_rule_id>/batch/<batch_id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["price_rule_id", "batch_id"], "path" => "price_rules/<price_rule_id>/batch/<batch_id>/discount_codes.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds Allowed indexes:
     *     price_rule_id
     * @param mixed[] $params
     *
     * @return DiscountCode|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): DiscountCode {
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
     *     price_rule_id
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
     *     price_rule_id
     *     batch_id
     * @param mixed[] $params
     *
     * @return DiscountCode[]
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
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     code
     *
     * @return mixed
     */
    public static function lookup(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "lookup",
            $session,
            [],
            $params,
            [],
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     times_used,
     *     times_used_min,
     *     times_used_max
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
     * @param Session $session
     * @param array $otherIds Allowed indexes:
     *     price_rule_id
     *     batch_id
     * @param mixed[] $params
     *
     * @return mixed
     */
    public static function get_all(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "get_all",
            $session,
            $otherIds,
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
    public function batch(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "batch",
            $this->session,
            ["price_rule_id" => $this->price_rule_id],
            $params,
            $body,
            $this,
        );
    }

}
