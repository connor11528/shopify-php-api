<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $api_client_id
 * @property Balance|null $balance
 * @property string|null $code
 * @property string|null $created_at
 * @property Currency|null $currency
 * @property int|null $customer_id
 * @property string|null $disabled_at
 * @property string|null $expires_on
 * @property int|null $id
 * @property float|null $initial_value
 * @property string|null $last_characters
 * @property int|null $line_item_id
 * @property string|null $note
 * @property int|null $order_id
 * @property string|null $template_suffix
 * @property string|null $updated_at
 * @property int|null $user_id
 */
class GiftCard extends Base
{
    protected static array $HAS_ONE = [
        "balance" => Balance::class,
        "currency" => Currency::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "gift_cards.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "gift_cards.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "gift_cards/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "gift_cards/<id>.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "gift_cards/count.json"],
        ["http_method" => "post", "operation" => "disable", "ids" => ["id"], "path" => "gift_cards/<id>/disable.json"],
        ["http_method" => "get", "operation" => "search", "ids" => [], "path" => "gift_cards/search.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return GiftCard|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): GiftCard {
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
     *     status,
     *     limit,
     *     since_id,
     *     fields
     *
     * @return GiftCard[]
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
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     order,
     *     query,
     *     limit,
     *     fields
     *
     * @return mixed
     */
    public static function search(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "search",
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
    public function disable(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "disable",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
