<?php
namespace App\Console\Commands;

use GuzzleHttp\Client;
use App\Services\LotteryService;
use App\Models\Lottery;

class UpdateWinningNumberJob
{
    protected $lottery;
    protected $code;

    public __construct(Lottery $lottery)
    {
        $this->lottery  = $lottery;
    }

    public function handle()
    {
        try {
            // $this->lottery->gameId 為 int，指彩種編號，
            // 重慶時時彩 = 1
            // 北京11選5 = 2
            // $this->lottery->issue 為 string , 為此 lottery 期號（e.g. "20190903001"）
            $target = new LotteryService($this->lottery); // 請實現此 class
            $this->lottery->update([
                'winning_number' => $target->getWinningNumber();
            ]);
        } catch (FetchFailureException $e) {
            Log::error('Something went wrong.');
        }
    }
}