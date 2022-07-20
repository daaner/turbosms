<?php

namespace Daaner\TurboSMS\Tests;

use Daaner\TurboSMS\TurboSMS;

class TurboSMSTest extends TestCase
{
    /**
     * @var TurboSMS
     */
    private $serv;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serv = new TurboSMS();
    }

    /**
     * @covers TurboSMS::setApi($api)
     * @covers TurboSMS::getApi()
     *
     * @return void
     */
    public function test_set_get_api()
    {
        $this->serv->setApi('Foo');

        $this->assertEquals('Foo', $this->serv->getApi());
    }

    /**
     * @covers TurboSMS::getApi()
     *
     * @return void
     */
    public function test_get_empty_api()
    {
        $this->assertEquals(config('turbosms.api_key'), $this->serv->getApi());
    }

    /**
     * @covers TurboSMS::setViberSender($sender)
     * @covers TurboSMS::getViberSender()
     *
     * @return void
     */
    public function test_set_get_ViberSender()
    {
        $this->serv->setViberSender('FooBar');

        $this->assertEquals('FooBar', $this->serv->getViberSender());
    }

    /**
     * @covers TurboSMS::getViberSender()
     *
     * @return void
     */
    public function test_get_empty_ViberSender()
    {
        $this->assertEquals(config('turbosms.viber_sender'), $this->serv->getViberSender());
    }

    /**
     * @covers TurboSMS::setSMSSender($sender)
     * @covers TurboSMS::getSMSSender()
     *
     * @return void
     */
    public function test_set_get_SMSSender()
    {
        $this->serv->setSMSSender('Baz');

        $this->assertEquals('Baz', $this->serv->getSMSSender());
    }

    /**
     * @covers TurboSMS::getSMSSender()
     *
     * @return void
     */
    public function test_get_empty_SMSSender()
    {
        $this->assertEquals(config('turbosms.sms_sender'), $this->serv->getSMSSender());
    }
}
