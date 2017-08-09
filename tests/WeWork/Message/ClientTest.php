<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyWeChat\Tests\WeWork\Message;

use EasyWeChat\Tests\TestCase;
use EasyWeChat\WeWork\Message\Client;
use EasyWeChat\WeWork\Message\Messenger;

class ClientTest extends TestCase
{
    public function testMessage()
    {
        $client = $this->mockApiClient(Client::class);

        $this->assertInstanceOf(Messenger::class, $client->message('hello'));
    }

    public function testSend()
    {
        $client = $this->mockApiClient(Client::class);

        $client->expects()->httpPostJson('message/send', ['foo' => 'bar'])->andReturn('mock-result');

        $this->assertSame('mock-result', $client->send(['foo' => 'bar']));
    }
}
