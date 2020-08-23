<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Counter;


class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
