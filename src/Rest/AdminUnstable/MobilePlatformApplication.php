<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $application_id
 * @property array|null $enabled_shared_webcredentials
 * @property bool|null $enabled_universal_or_app_links
 * @property int|null $id
 * @property string|null $platform
 * @property string[]|null $sha256_cert_fingerprints
 */
class MobilePlatformApplication extends Base
{
    protected static array $HAS_ONE = [];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "mobile_platform_applications.json"],
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "mobile_platform_applications.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "mobile_platform_applications/<id>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "mobile_platform_applications/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "mobile_platform_applications/<id>.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return MobilePlatformApplication|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): MobilePlatformApplication {
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
     * @param mixed[] $params
     *
     * @return MobilePlatformApplication[]
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
