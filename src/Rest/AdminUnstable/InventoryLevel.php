<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property int|null $available
 * @property int|null $inventory_item_id
 * @property int|null $location_id
 * @property string|null $updated_at
 */
class InventoryLevel extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "inventory_levels.json"],
        ["http_method" => "post", "operation" => "adjust", "ids" => [], "path" => "inventory_levels/adjust.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => [], "path" => "inventory_levels.json"],
        ["http_method" => "post", "operation" => "connect", "ids" => [], "path" => "inventory_levels/connect.json"],
        ["http_method" => "post", "operation" => "set", "ids" => [], "path" => "inventory_levels/set.json"]
    ];

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     inventory_item_id,
     *     location_id
     *
     * @return RestResponse
     */
    public static function delete(
        Session $session,
        array $otherIds,
        array $params = []
    ): RestResponse {
        return parent::request(
            "delete",
            "delete",
            $session,
            [],
            $params,
        );
    }

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     inventory_item_ids,
     *     location_ids,
     *     limit,
     *     updated_at_min
     *
     * @return InventoryLevel[]
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
     * @param mixed[] $params Allowed indexes:
     *     inventory_item_id,
     *     location_id,
     *     available_adjustment
     * @param array|string $body
     *
     * @return mixed
     */
    public function adjust(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "adjust",
            $this->session,
            [],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     inventory_item_id,
     *     location_id,
     *     relocate_if_necessary
     * @param array|string $body
     *
     * @return mixed
     */
    public function connect(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "connect",
            $this->session,
            [],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     inventory_item_id,
     *     location_id,
     *     available,
     *     disconnect_if_necessary
     * @param array|string $body
     *
     * @return mixed
     */
    public function set(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "set",
            $this->session,
            [],
            $params,
            $body,
            $this,
        );
    }

}
