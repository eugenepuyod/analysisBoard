<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class JsonPage extends Component
{
    public $toggleFlip = 0;

    public function toggleClick(){
        $this->toggleFlip = !$this->toggleFlip ? 1 : 0;
        $this->dispatch('toggleUpdated', $this->toggleFlip);
    }
    
    public function render()
    {
        return view('livewire.json-page');
    }
}
