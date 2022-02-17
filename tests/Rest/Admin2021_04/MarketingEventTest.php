<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\Admin2021_04\MarketingEvent;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class MarketingEvent202104Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-04";

        $this->test_session = new Session("session_id", "test-shop.myshopify.io", true, "1234");
        $this->test_session->setAccessToken("this_is_a_test_token");
    }

    /**

     *
     * @return void
     */
    public function test_1(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        MarketingEvent::all(
            $this->test_session,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_2(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["marketing_event" => ["started_at" => "2022-12-15", "utm_campaign" => "Christmas2022", "utm_source" => "facebook", "utm_medium" => "cpc", "event_type" => "ad", "referring_domain" => "facebook.com", "marketing_channel" => "social", "paid" => true]]),
            ),
        ]);

        $marketing_event = new MarketingEvent($this->test_session);
        $marketing_event->started_at = "2022-12-15";
        $marketing_event->utm_campaign = "Christmas2022";
        $marketing_event->utm_source = "facebook";
        $marketing_event->utm_medium = "cpc";
        $marketing_event->event_type = "ad";
        $marketing_event->referring_domain = "facebook.com";
        $marketing_event->marketing_channel = "social";
        $marketing_event->paid = true;
        $marketing_event->save();
    }

    /**

     *
     * @return void
     */
    public function test_3(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events/count.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        MarketingEvent::count(
            $this->test_session,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_4(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events/998730532.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        MarketingEvent::find(
            $this->test_session,
            998730532,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_5(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events/998730532.json",
                "PUT",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["marketing_event" => ["id" => 998730532, "remote_id" => "1000:2000", "started_at" => "2022-02-02T00:00  00:00", "ended_at" => "2022-02-03T00:00  00:00", "scheduled_to_end_at" => "2022-02-04T00:00  00:00", "budget" => 11.1, "budget_type" => "daily", "currency" => "CAD", "utm_campaign" => "other", "utm_source" => "other", "utm_medium" => "other", "event_type" => "ad", "referring_domain" => "instagram.com"]]),
            ),
        ]);

        $marketing_event = new MarketingEvent($this->test_session);
        $marketing_event->id = 998730532;
        $marketing_event->remote_id = "1000:2000";
        $marketing_event->started_at = "2022-02-02T00:00  00:00";
        $marketing_event->ended_at = "2022-02-03T00:00  00:00";
        $marketing_event->scheduled_to_end_at = "2022-02-04T00:00  00:00";
        $marketing_event->budget = 11.1;
        $marketing_event->budget_type = "daily";
        $marketing_event->currency = "CAD";
        $marketing_event->utm_campaign = "other";
        $marketing_event->utm_source = "other";
        $marketing_event->utm_medium = "other";
        $marketing_event->event_type = "ad";
        $marketing_event->referring_domain = "instagram.com";
        $marketing_event->save();
    }

    /**

     *
     * @return void
     */
    public function test_6(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events/998730532.json",
                "DELETE",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        MarketingEvent::delete(
            $this->test_session,
            998730532,
            [],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_7(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, ""),
                "https://test-shop.myshopify.io/admin/api/2021-04/marketing_events/998730532/engagements.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["engagements" => [["occurred_on" => "2022-01-15", "views_count" => 0, "clicks_count" => 0, "favorites_count" => 0, "ad_spend" => 10.0, "is_cumulative" => true], ["occurred_on" => "2022-01-16", "views_count" => 100, "clicks_count" => 50, "is_cumulative" => true], ["occurred_on" => "2022-01-17", "views_count" => 200, "clicks_count" => 100, "is_cumulative" => true]]]),
            ),
        ]);

        $marketing_event = new MarketingEvent($this->test_session);
        $marketing_event->id = 998730532;
        $marketing_event->engagements(
            [],
            ["engagements" => [["occurred_on" => "2022-01-15", "views_count" => 0, "clicks_count" => 0, "favorites_count" => 0, "ad_spend" => 10.0, "is_cumulative" => true], ["occurred_on" => "2022-01-16", "views_count" => 100, "clicks_count" => 50, "is_cumulative" => true], ["occurred_on" => "2022-01-17", "views_count" => 200, "clicks_count" => 100, "is_cumulative" => true]]],
        );
    }

}
