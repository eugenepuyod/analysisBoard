<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.empty')]
class StockDetails extends Component
{
    public $childVariation = [];
    public $childFen = "";
    public $toggle;

    public function mount(){
        $vardata = request()->data;
        $varfen = request()->fen;
        $vartoggle = request()->toggle;
        if(isset($vardata) && isset($varfen) && isset($vartoggle)){
            $itemArray = [];
            $explodedata = explode(' ',$vardata);
            foreach($explodedata as $index => $item){
                $start = substr($explodedata[$index], 0, 2);
                $last = substr($explodedata[$index], 2, 2);
                $fen = $start.'-'.$last;

                $itemArray[] = [
                    'fen' => $fen,
                    'start' => $start,
                    'last' => $last,
                ];
            }
            $this->childVariation = $itemArray;
            $this->childFen = $varfen;
            $this->toggle = $vartoggle;
            
        }
    }


    public function render()
    {
        return view('livewire.stock-details');
    }
}
