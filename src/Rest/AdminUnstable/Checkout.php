<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property array $billing_address
 * @property array[] $line_items
 * @property array|null $applied_discount
 * @property bool|null $buyer_accepts_marketing
 * @property string|null $created_at
 * @property Currency|null $currency
 * @property int|null $customer_id
 * @property DiscountCode|null $discount_code
 * @property string|null $email
 * @property GiftCard[]|null $gift_cards
 * @property Order|null $order
 * @property string|null $payment_due
 * @property string|null $payment_url
 * @property string|null $phone
 * @property string|null $presentment_currency
 * @property bool|null $requires_shipping
 * @property string|null $reservation_time
 * @property int|null $reservation_time_left
 * @property array|null $shipping_address
 * @property array|null $shipping_line
 * @property array|null $shipping_rate
 * @property string|null $source_name
 * @property string|null $subtotal_price
 * @property array[]|null $tax_lines
 * @property bool|null $taxes_included
 * @property string|null $token
 * @property string|null $total_price
 * @property string|null $total_tax
 * @property string|null $updated_at
 * @property int|null $user_id
 * @property string|null $web_url
 */
class Checkout extends Base
{
    protected static array $HAS_ONE = [
        "currency" => Currency::class,
        "discount_code" => DiscountCode::class,
        "order" => Order::class
    ];
    protected static array $HAS_MANY = [
        "gift_cards" => GiftCard::class
    ];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "checkouts.json"],
        ["http_method" => "post", "operation" => "complete", "ids" => ["token"], "path" => "checkouts/<token>/complete.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["token"], "path" => "checkouts/<token>.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["token"], "path" => "checkouts/<token>.json"],
        ["http_method" => "get", "operation" => "shipping_rates", "ids" => ["token"], "path" => "checkouts/<token>/shipping_rates.json"]
    ];
    protected static string $PRIMARY_KEY = "token";

    /**
     * @param Session $session
     * @param int|string $token
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return Checkout|null
     */
    public static function find(
        Session $session,
        $token,
        array $otherIds,
        array $params = []
    ): Checkout {
        $result = parent::baseFind(
            $session,
            array_merge(["token" => $token], $otherIds),
            $params,
        );
        return !empty($result) ? $result[0] : null;
    }

    /**
     * @param Session $session
     * @param int|string $token
     * @param array $otherIds
     * @param mixed[] $params
     *
     * @return mixed
     */
    public static function shipping_rates(
        Session $session,
        $token,
        array $otherIds,
        array $params = []
    ): mixed {
        return parent::request(
            "get",
            "shipping_rates",
            $session,
            array_merge(["token" => $token], $otherIds),
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
    public function complete(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "complete",
            $this->session,
            ["token" => $this->token],
            $params,
            $body,
            $this,
        );
    }

}
