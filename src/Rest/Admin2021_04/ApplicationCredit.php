<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_04;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $amount
 * @property string|null $description
 * @property int|null $id
 * @property string|null $test
 */
class ApplicationCredit extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "application_credits.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "application_credits.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "application_credits/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return ApplicationCredit|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): ApplicationCredit {
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
     *     fields
     *
     * @return ApplicationCredit[]
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
