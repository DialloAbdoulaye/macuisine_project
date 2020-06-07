<?php

namespace App\Http\Livewire;
use App\Plat;
use Livewire\Component;


class Recipe extends Component
{
    public $recipes;




    public function render()
    {
        $this->recipes =Plat::all();
        return view('livewire.recipe');
    }
}
