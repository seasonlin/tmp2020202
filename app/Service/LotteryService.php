<?php

namespace App\Services;

use GuzzleHttp\Client;

class LiftService
{
    protected $source;

    public function __construct()
    {
        $this->source = [
            1 => [
                "code"      => "ssc",
                "method"    => "GET",
            ],
            2 => [
                "code"      => "bjsyxw",
                "method"    => "GET",
            ],
        ];
    }

    public function getWinningNumber()
    {
        $client     = new Client();
        $url        = $this->getUrl($lottery->gameId, $lottery);
        $response   = $client->request([$lottery->gameId], $value['url']);
    }

    protected function getUrl($source, $lottery)
    {
        switch($type)
        {
            case 1:
                $this->type_A($lottery);
                break;
            case 2:
                $this->type_B($this->source[$lottery->gameId]["code"]);
                break;
        }
    }

    // 重慶時時彩
    protected function type_A($lottery)
    {
        return "http://one.fake/v1?gamekey=" . $lottery->gameId . "&issue=" . $lottery->issue;
    }

    // 北京11選5
    protected function type_B($code)
    {
        return "https://two.fake/newly.do?code=" . $code;
    }
}