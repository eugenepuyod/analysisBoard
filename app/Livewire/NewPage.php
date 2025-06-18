<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class NewPage extends Component
{

    public function render()
    {
        return view('livewire.new-page');
    }
}
