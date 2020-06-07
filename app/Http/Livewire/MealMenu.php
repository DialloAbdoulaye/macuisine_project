<?php

namespace App\Http\Livewire;
use App\Recipe;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MealMenu extends Component
{
    public $recipes;
    public $recipe;
    public $add =false;
    public $showRecipe;
    public $libelle;
    public $ingredients;
    public $preparations;

    public $inArray=[];
    public $prepaArray =[];


    public function mount(){
        $this->recipes =Recipe::all();
        $this->showRecipe = Recipe::first();
        $this->libelle = $this->showRecipe->libelle;
        $this->ingred = $this->showRecipe->ingredients;
        $this->inArray = explode(',',$this->ingred);
        $this->prepa = $this->showRecipe->preparations;
        $this->prepaArray = explode(',',$this->prepa);
    }

    public function refresh(){
        $this->recipes =Recipe::all();
        $this->showRecipe = Recipe::first();
        $this->libelle = $this->showRecipe->libelle;
        $this->ingred = $this->showRecipe->ingredients;
        $this->inArray = explode(',',$this->ingred);
         $this->prepa = $this->showRecipe->preparations;
         $this->prepaArray = explode(',',$this->prepa);
    }

    public function render()
    {
        return view('livewire.meal-menu');
    }



    public function addRecipe(){
        $this->validate([
            'recipe' => 'required',
            'ingredients'=>'required',
            'preparations'=>'required'
        ]);
         Recipe::create(['libelle' => $this->recipe,
                         'ingredients'=>$this->ingredients,
                         'preparations'=>$this->preparations,
                         ]);
        $this->add = true;
        if(  $this->add){
            $this->refresh();
            session()->flash('success','Recipe added successfuly!');
            $this->reset('recipe');
            $this->reset('ingredients');
            $this->reset('preparations');

        }

    }

    public function show(int $id){
       $this->showRecipe= Recipe::findOrfail($id);
       $this->libelle = $this->showRecipe->libelle;
       $this->ingred = $this->showRecipe->ingredients;
       $this->inArray = explode(',',$this->ingred);
        $this->prepa = $this->showRecipe->preparations;
        $this->prepaArray = explode(',',$this->prepa);
    }

    public function destroy(int $id){
       if($id){
           $recip =Recipe::where('id',$id);
           $recip->delete();
           $this->refresh();
       }
       session()->flash('delete','Recipe removed successfuly!');
    }



}
