<?php

declare(strict_types=1);

namespace ShopifyTest\Auth;

use Shopify\Auth\Session;
use Shopify\Auth\FileSessionStorage;
use ShopifyTest\BaseTestCase;

final class FileSessionStorageTest extends BaseTestCase
{
    private string $sessionId = 'test_session';
    private Session $session;

    public function setUp(): void
    {
        $this->session = new Session($this->sessionId);
        $this->session->setShop('test-shop.myshopify.io');
        $this->session->setState('1234');
        $this->session->setScope('read_products');
        $this->session->setExpires(strtotime('+1 day'));
        $this->session->setIsOnline(true);
        $this->session->setAccessToken('totally_real_access_token');
    }

    public function testDeleteSession()
    {
        $storage = new FileSessionStorage();

        $this->assertEquals(true, $storage->deleteSession($this->sessionId));
    }
}
