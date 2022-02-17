<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string $event_type
 * @property string $marketing_channel
 * @property bool $paid
 * @property string $started_at
 * @property array|null $UTM_parameters
 * @property string|null $budget
 * @property string|null $budget_type
 * @property string|null $currency
 * @property string|null $description
 * @property string|null $ended_at
 * @property int|null $id
 * @property string|null $manage_url
 * @property array[]|null $marketed_resources
 * @property string|null $preview_url
 * @property string|null $referring_domain
 * @property string|null $remote_id
 * @property string|null $scheduled_to_end_at
 */
class MarketingEvent extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "marketing_events.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "marketing_events.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "marketing_events/count.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "marketing_events/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "marketing_events/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "marketing_events/<id>.json"],
        ["http_method" => "post", "operation" => "engagements", "ids" => ["id"], "path" => "marketing_events/<id>/engagements.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return MarketingEvent|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): MarketingEvent {
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
     *     offset
     *
     * @return MarketingEvent[]
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

    /**
     * @param mixed[] $params Allowed indexes:
     *     occurred_on,
     *     impressions_count,
     *     views_count,
     *     clicks_count,
     *     shares_count,
     *     favorites_count,
     *     comments_count,
     *     ad_spend,
     *     is_cumulative
     * @param array|string $body
     *
     * @return mixed
     */
    public function engagements(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "engagements",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
