<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Recipe;

class RecipeSearchBar extends Component
{
    public $query;
    public $recipes;
    public $higlightIndex = 0;

    public function mount(){
        $this->resetfunction();
    }

    public function resetfunction(){
        $this->query ='';
        $this->recipes =[];
        $this->$higlightIndex = 0;
    }
    public function updatedQuery(){
        sleep(2);
        $this->recipes = Recipe::where('libelle', 'like','%'.$this->query.'%')
           ->get();
    }

    public function render()
    {
        return view('livewire.recipe-search-bar',['recipes'=>$this->recipes]);
    }
}
