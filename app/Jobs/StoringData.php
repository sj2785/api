<?php

namespace App\Jobs;

use App\Models\Crypto;
use Illuminate\Bus\Queueable;
use App\Services\Crypto\CryptoHandler;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class StoringData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $crypto;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $crypto = new CryptoHandler();
        $data = $crypto->livePrice();
        foreach($data as $item)
        {
            Crypto::create([
                'name' => $item['name'],
                'current-price' => $item['current_price']
            ]);           
        }
    }
}
