<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $currency
 * @property string|null $rate_updated_at
 */
class Currency extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "currencies.json"]
    ];

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Currency[]
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
