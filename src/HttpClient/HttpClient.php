<?php
/*
 * This file is part of the php127/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Douyin\HttpClient;

use GuzzleHttp\Client;

/**
 * HttpClient.
 *
 * @package Php127\Douyin\HttpClient
 *
 * @author 读心印 <aa24615@qq.com>
 */
class HttpClient implements HttpClientInterface
{
    private static $client = null;

    public static function client()
    {
        if (self::$client == null) {
            self::$client = new Client([
                'timeout' => 10,
                'http_errors' => false,
                'verify' => false,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1'
                ]
            ]);
        }
        return self::$client;
    }


    public static function get(string $url)
    {
        $client = self::client();
        $response = $client->get($url);
        print_r($response);
        return $response->getBody()->getContents();
    }
}