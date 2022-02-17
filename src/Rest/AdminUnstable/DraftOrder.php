<?php

declare(strict_types=1);

namespace Shopify\Rest\AdminUnstable;

use Shopify\Auth\Session;
use Shopify\Clients\RestResponse;
use Shopify\Rest\Base;

/**
 * @property array|null $applied_discount
 * @property array|null $billing_address
 * @property string|null $completed_at
 * @property string|null $created_at
 * @property Currency|null $currency
 * @property Customer|null $customer
 * @property string|null $email
 * @property int|null $id
 * @property string|null $invoice_sent_at
 * @property string|null $invoice_url
 * @property array|null $line_items
 * @property string|null $name
 * @property string|null $note
 * @property array[]|null $note_attributes
 * @property int|null $order_id
 * @property array|null $payment_terms
 * @property array|null $shipping_address
 * @property array|null $shipping_line
 * @property string|null $status
 * @property float|null $subtotal_price
 * @property string|null $tags
 * @property bool|null $tax_exempt
 * @property string[]|null $tax_exemptions
 * @property array[]|null $tax_lines
 * @property bool|null $taxes_included
 * @property string|null $total_price
 * @property string|null $total_tax
 * @property string|null $updated_at
 */
class DraftOrder extends Base
{
    protected static array $HAS_ONE = [
        "customer" => Customer::class,
        "currency" => Currency::class
    ];
    protected static array $HAS_MANY = [];
    protected static array $PATHS = [
        ["http_method" => "post", "operation" => "post", "ids" => [], "path" => "draft_orders.json"],
        ["http_method" => "get", "operation" => "get", "ids" => [], "path" => "draft_orders.json"],
        ["http_method" => "put", "operation" => "put", "ids" => ["id"], "path" => "draft_orders/<id>.json"],
        ["http_method" => "get", "operation" => "get", "ids" => ["id"], "path" => "draft_orders/<id>.json"],
        ["http_method" => "delete", "operation" => "delete", "ids" => ["id"], "path" => "draft_orders/<id>.json"],
        ["http_method" => "get", "operation" => "count", "ids" => [], "path" => "draft_orders/count.json"],
        ["http_method" => "post", "operation" => "send_invoice", "ids" => ["id"], "path" => "draft_orders/<id>/send_invoice.json"],
        ["http_method" => "put", "operation" => "complete", "ids" => ["id"], "path" => "draft_orders/<id>/complete.json"]
    ];

    /**
     * @param Session $session
     * @param int|string $id
     * @param array $otherIds
     * @param mixed[] $params Allowed indexes:
     *     fields
     *
     * @return DraftOrder|null
     */
    public static function find(
        Session $session,
        $id,
        array $otherIds,
        array $params = []
    ): DraftOrder {
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
     *     fields,
     *     limit,
     *     since_id,
     *     updated_at_min,
     *     updated_at_max,
     *     ids,
     *     status
     *
     * @return DraftOrder[]
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
     *     since_id,
     *     status,
     *     updated_at_max,
     *     updated_at_min
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
     * @param mixed[] $params
     * @param array|string $body
     *
     * @return mixed
     */
    public function send_invoice(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "post",
            "send_invoice",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

    /**
     * @param mixed[] $params Allowed indexes:
     *     payment_pending
     * @param array|string $body
     *
     * @return mixed
     */
    public function complete(
        array $params = [],
        $body = []
    ): mixed {
        return parent::request(
            "put",
            "complete",
            $this->session,
            ["id" => $this->id],
            $params,
            $body,
            $this,
        );
    }

}
