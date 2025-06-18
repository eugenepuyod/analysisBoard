<?php

namespace App\Livewire;

use App\Models\GameModel;
use App\Models\MovesModel;
use Livewire\Component;

class AddVariation extends Component
{
    // game turn
    public $gameturn;
    public $wirecolorWon;

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required|min:6',
    ];

    protected $messages = [
        'name.required' => 'The name field cannot be empty.',
        'description.required' => 'The description field cannot be empty.',
    ];

    protected $validationAttributes = [
        'name' => 'name',
    ];


    // games table rows:
    // name, description, rwhite, rblack, white, black, book,
    // play, randomgame, todo, donetodo, variationid, date
    
    public $name; // name
    public $category; // book
    public $player; // variationid
    public $description; // description


    // moves table rows:
    // gameid, classorid, movesource, variation, fened
    public $gameid; // gameid
    public $moveId; // classorid
    public $moveSourceId; // movesource
    public $gameVariantion; // variation
    public $newgameVariantion; // variation
    public $fened; // fened


    // filter data
    public $wirevariantionIdfilter = []; // variation return e4, e5
    public $wirenewfenedFilter = []; // fened
    public $wiremoveIdfilter = []; // moveId
    public $wiremoveSourcefilter = []; // movesource
    public $wiremoveSourceCast;


    // update objects set form javascript
    public function updateFened($value){
        $this->fened = $value;
    }

    public function updateMoveId($value){
        $this->moveId = $value;
    }

    public function updateMoveSourceId($value){
        $this->moveSourceId = $value;
    }

    public function updateGameVariantion($value){
        $this->gameVariantion = $value;
    }

    public function updateWirecolorWon($value){
        $this->wirecolorWon = $value;
    }

    public function updateGameturn($value){
        $this->gameturn = $value;
    }



    public function getVariation($post){
        $variantionId = $post;
        $variantionId = explode(" ",$variantionId);
        $variantionIdmap = array_map("trim",$variantionId);
        $variantionIdfilter = array_values(array_filter($variantionIdmap));
        $this->wirevariantionIdfilter = $variantionIdfilter;
    }

    public function getfened($post){
        $fenedPost = $post;
        $fenedExplode = explode(" && ",$fenedPost);
        $fenedTrim = array_map("trim",$fenedExplode);
        $fenedFilter = array_values(array_filter($fenedTrim));
        unset($fenedFilter[0]);
        $newfenedFilter = array_values($fenedFilter);
        $this->wirenewfenedFilter = $newfenedFilter;
    }

    public function getMoveId($post){
        $moveId = $post;
        $moveId = explode(" ",$moveId);
        $moveIdmap = array_map("trim",$moveId);
        $moveIdfilter = array_values(array_filter($moveIdmap));
        $this->wiremoveIdfilter = $moveIdfilter;
    }

    public function getMoveSource($post){
        $moveSource = $post;
        $moveSource = explode(" ",$moveSource);
        $moveSourcemap = array_map("trim",$moveSource);
        $moveSourcefilter = array_values(array_filter($moveSourcemap));
        $this->wiremoveSourcefilter = $moveSourcefilter;
    }

    public function getMoveCastling($moveSourcefilter){
        $moveSourceCast = "";
        if($moveSourcefilter == 'e1-g1'){
            $moveSourceCast = 'e1-g1, h1-f1';
        }else if($moveSourcefilter == 'e1-c1'){
            $moveSourceCast = 'e1-c1, a1-d1';
        }else if($moveSourcefilter == 'e8-g8'){
            $moveSourceCast = 'e8-g8, h8-f8';
        }else if($moveSourcefilter == 'e8-c8'){
            $moveSourceCast = 'e8-c8, a8-d8';
        }
        else{
            $moveSourceCast = $moveSourcefilter;
        }
        $this->wiremoveSourceCast = $moveSourceCast;
    }


    public function submit(){
        $this->validate();

        $white = ($this->wirecolorWon == "White") ? 1 : 0;
        $black = ($this->wirecolorWon == "Black") ? 1 : 0;
        $checkPlayerIsEmpty = ($this->player == "") ? "1" : $this->player; // new player data
        $checkCategoryIsEmpty = ($this->category == "") ? "1" : $this->category; // category data
        
        $this->getVariation($this->gameVariantion);
        $this->getfened($this->fened);

        $rwhite = (count($this->wirevariantionIdfilter) % 2 == 0) ? 1 : 0;
        $rblack = (count($this->wirevariantionIdfilter) % 2 != 0) ? 1 : 0;

        $rblack = ($white) ? 0 : $rblack;
        $rwhite = ($black) ? 0 : $rwhite;

        $this->getMoveId($this->moveId);
        $this->getMoveSource($this->moveSourceId);

        // save game
        $game = new GameModel();
        $game->name = $this->name;
        $game->description = $this->description;
        $game->rwhite = $rwhite;
        $game->rblack = $rblack;
        $game->white = $white;
        $game->black = $black;
        $game->book = $checkCategoryIsEmpty;
        $game->variationid = $checkPlayerIsEmpty;
        $game->save();

        // save moves
        if($game->id){
            for($i = 0; $i < count($this->wirevariantionIdfilter); $i++){
                $this->getMoveCastling($this->wiremoveSourcefilter[$i]);

                $moves = new MovesModel();
                $moves->game_id = $game->id;
                $moves->classorid = $this->wiremoveIdfilter[$i];
                $moves->movesource = $this->wiremoveSourceCast;
                $moves->variantion = $this->wirevariantionIdfilter[$i];
                $moves->fened = $this->wirenewfenedFilter[$i];
                $moves->save(); 

            }  
        }

        $this->name = "";
        $this->category = "";
        $this->player = "";
        $this->description = "";

        return $this->redirect('/all-games', navigate: true);
    }

    public function cancel(){
        $this->name = "";
        $this->category = "";
        $this->player = "";
        $this->description = "";
        // return $this->redirect('/json-page', navigate: true);
    }

    public function render()
    {
        return view('livewire.add-variation');
    }
}
