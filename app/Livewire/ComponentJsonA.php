<?php

namespace App\Livewire;

use Livewire\Component;

class ComponentJsonA extends Component
{
    public $param;

    public function getparam()
    {
        $this->param = 'test';
    }
    public function render()
    {
        return view('livewire.component-json-a');
    }
}
