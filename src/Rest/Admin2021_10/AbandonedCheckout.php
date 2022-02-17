<?php

declare(strict_types=1);

namespace Shopify\Rest\Admin2021_10;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property string|null $abandoned_checkout_url
 * @property array|null $billing_address
 * @property bool|null $buyer_accepts_marketing
 * @property bool|null $buyer_accepts_sms_marketing
 * @property string|null $cart_token
 * @property string|null $closed_at
 * @property string|null $completed_at
 * @property string|null $created_at
 * @property Currency|null $currency
 * @property Customer|null $customer
 * @property string|null $customer_locale
 * @property int|null $device_id
 * @property DiscountCode[]|null $discount_codes
 * @property string|null $email
 * @property string|null $gateway
 * @property int|null $id
 * @property string|null $landing_site
 * @property array|null $line_items
 * @property int|null $location_id
 * @property string|null $note
 * @property string|null $phone
 * @property string|null $presentment_currency
 * @property string|null $referring_site
 * @property array|null $shipping_address
 * @property array|null $shipping_lines
 * @property string|null $sms_marketing_phone
 * @property string|null $source_name
 * @property string|null $subtotal_price
 * @property array|null $tax_lines
 * @property bool|null $taxes_included
 * @property string|null $token
 * @property string|null $total_discounts
 * @property string|null $total_duties
 * @property string|null $total_line_items_price
 * @property string|null $total_price
 * @property string|null $total_tax
 * @property int|null $total_weight
 * @property string|null $updated_at
 * @property int|null $user_id
 */
class AbandonedCheckout extends Base
{
    protected static array $HAS_ONE = [
        "currency" => Currency::class,
        "customer" => Customer::class
    ];
    protected static array $HAS_MANY = [
        "discount_codes" => DiscountCode::class
    ];
    protected static array $PATHS = [
        ["http_method" => "get", "operation" => "checkouts", "ids" => [], "path" => "checkouts.json"],
        ["http_method" => "get", "operation" => "checkouts", "ids" => [], "path" => "checkouts.json"]
    ];

    /**
     * @param Session $session
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     since_id,
     *     created_at_min,
     *     created_at_max,
     *     updated_at_min,
     *     updated_at_max,
     *     status,
     *     limit
     *
     * @return mixed
     */
    public static function checkouts(
        Session $session,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "checkouts",
            $session,
            [],
            $params,
            [],
        );
    }

}
