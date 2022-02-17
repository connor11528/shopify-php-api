<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2022_01;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $activated_on
 * @property string|null $billing_on
 * @property string|null $cancelled_on
 * @property string|null $capped_amount
 * @property string|null $confirmation_url
 * @property string|null $created_at
 * @property int|null $id
 * @property string|null $name
 * @property string|null $price
 * @property string|null $return_url
 * @property string|null $status
 * @property string|null $terms
 * @property string|null $test
 * @property int|null $trial_days
 * @property string|null $trial_ends_on
 * @property string|null $updated_at
 */
class RecurringApplicationCharge extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "recurring_application_charges.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "recurring_application_charges.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "recurring_application_charges/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "recurring_application_charges/<id>.json"],
        ["http_method" => "put", "operation" => "customize", "ids" => ["id"], "path" => "recurring_application_charges/<id>/customize.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return RecurringApplicationCharge|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): RecurringApplicationCharge {
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
     *     since_id,
     *     fields
     *
     * @return RecurringApplicationCharge[]
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
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function customize(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "put",
            "customize",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
