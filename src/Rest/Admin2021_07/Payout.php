<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_07;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $amount
 * @property Currency|null $currency
 * @property string|null $date
 * @property int|null $id
 * @property string|null $status
 */
class Payout extends Base
{
    protected static array $HAS_ONE = [
        "currency" => Currency::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "shopify_payments/payouts.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "shopify_payments/payouts/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Payout|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): Payout {
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
     *     since_id,
     *     last_id,
     *     date_min,
     *     date_max,
     *     date,
     *     status
     *
     * @return Payout[]
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

}
