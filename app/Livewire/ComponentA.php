<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ComponentA extends Component
{
    public $response;

    protected $listeners = [
        'responseFromParent' => 'handleDataFromB'
    ];

    public function requestDataFromB()
    {
        // Dispatch a custom browser event to the client-side
        $this->dispatch('responseFromParent', ['message' => 'Hello from ComponentA']);
    }

    // Handle the event from ComponentB and process the data
    public function handleDataFromB($data)
    {
        $this->response = $data;
    }

    public function render()
    {
        return view('livewire.component-a');
    }
}
