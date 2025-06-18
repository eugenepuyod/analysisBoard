<?php

namespace App\Livewire;

use App\Models\GameModel;
use App\Models\MovesModel;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class AllGames extends Component
{
    use WithPagination;

    public $search = '';



    // public $data = [];
    // public function mount(){
        
    //     // $games = GameModel::find(1);
        
    //     // dd(count($games->moves));

    //     dd($this->getNoMoves(1));
        
        
    // }
    // public function getNoMoves($id){
    //     $moves = GameModel::find($id);
    //     return count($moves->moves);
    // }






    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.all-games', [
            'allgames' => GameModel::search($this->search)
            ->with('moves')
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString(),
        ]);
    }
}
