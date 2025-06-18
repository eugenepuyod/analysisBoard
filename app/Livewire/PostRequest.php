<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PostRequest extends Component
{
    public $maingameVariantion = '';
    public $mainGameVarArray = [];
    public $moveTurn = 1;

    // protected $listiner = 'updateMaingameVariantion';

    public function updateMaingameVariantion($value){
        $this->maingameVariantion = $value;
    }

    public function getMainVarMathod(){
        $variationArray = [];
        if(isset($this->maingameVariantion) && !empty($this->maingameVariantion)){
            $maingameVariantionValue = $this->maingameVariantion;
            $explodeVariatons = explode(' ',$maingameVariantionValue);
            foreach($explodeVariatons as $index => $variation){
                if($index % 2 == 0){
                    $this->moveTurn = 0;
                    $variationArray[] = [
                        'move1' => $explodeVariatons[$index],
                        'move2' => isset($explodeVariatons[$index + 1]) ? $explodeVariatons[$index + 1] : "",
                    ];
                }else{
                    $this->moveTurn = 1;
                }
            }

        }
        $this->mainGameVarArray = $variationArray;
        
    }

    public function render()
    {
        return view('livewire.post-request');
    }




    // public $response;
    // public $name;
    // public $apiToken;

    // public function mount()
    // {
    //     $this->apiToken = env('API_TOKEN');
    // }

    // public function sendData()
    // {
    //     // Make sure to use the full URL
    //     $response = Http::post('http://127.0.0.1:8000/submit-data', [
    //         'name' => $this->name,
    //     ]);

    //     if ($response->failed()) {
    //         $this->response = ['error' => 'API request failed with status ' . $response->status()];
    //     } elseif ($response->successful()) {
    //         $this->response = $response->json();
    //     }
    // }

    
}
