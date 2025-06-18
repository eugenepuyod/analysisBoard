<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GameModel;
use App\Models\MovesModel;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class DetailPage extends Component  
{
    public $id;
    public $userId;
    public $variantion = [];
    public $fenedVariantion = [];
    public $moveVariation = [];
    public $data = [];
    

    public function mount(){
        $this->userId = Auth::id();

        $this->id = request()->query('id');
        // Get movesource
        $getMoveSource = MovesModel::where('game_id', $this->id)->get();
        $getGame = GameModel::where('id', $this->id)->get();
        $this->data = $getGame;
        
        foreach($getMoveSource as $index => $move){
            $movesource = $move->movesource;
            $getfened = $move->fened;

            // get movesource
            $movesexplode = explode(", ", $movesource);
            $filtermove = "";
            if(isset($movesexplode[1])){
                $filtermove = [$movesexplode[0], $movesexplode[1]];
            }else{
                $filtermove = [$movesource];
            }
            $this->variantion[] = [   
                'moves' => $filtermove,
            ];

            // get fened
            $this->fenedVariantion[] = [
                'fened' => $getfened,
            ];

            if($index % 2 == 0){
                $this->moveVariation[] = [
                    'move1' => $getMoveSource[$index]->variantion,
                    'move2' => isset($getMoveSource[$index + 1]) ? $getMoveSource[$index + 1]->variantion : "",
                ];
            }
        }

        
    }

    public function deleteItem($id){
        $game = GameModel::find($id);
        $deletedParent = $game->delete();
        if($deletedParent){
            $game->moves()->delete();
        }   
        return redirect()->route('all-games');
    }

    public function render()
    {
        return view('livewire.detail-page');
    }
}
