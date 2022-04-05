<?php

namespace App\Http\Controllers;

use App\Events\LivePrice;
use App\Jobs\StoringData;
use Illuminate\Http\Request;
use App\Services\Crypto\CryptoHandler;


class CryptoController extends Controller
{
    public $crypto;
    public function __construct(CryptoHandler $crypto)
    {
       $this->crypto = $crypto; 
    }
    public function index()
    {
        broadcast(new LivePrice($this->crypto));
        
        $data = $this->crypto->livePrice();
        
        return view('crypto.index',compact('data'));
    }
}
