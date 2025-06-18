<?php

namespace App\Livewire;

use Livewire\Component;

class ComponentB extends Component
{
    public $data = ['name' => 'Livewire', 'version' => '3.0'];

    public function sendDataToComponentA()
    {
        // Emit an event to ComponentA with the data
        $this->dispatch('App\Livewire\ComponentA', 'responseFromParent', $this->data);
    }

    public function render()
    {
        return view('livewire.component-b');
    }
}
