<?php

namespace App\Http\Livewire;
use App\Recipe;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class MealMenu extends Component
{
    public $recipes;
    public $recipe;
    public $add =false;
    public $showRecipe;
    public $libelle;
    public $lib;
    public $ingredients;
    public $preparations;
    public $selectedId;
    public $updateMode = false;

    public $inArray=[];
    public $prepaArray =[];

    public $searchBylib;


    public function mount(){
        $this->recipes =Recipe::all();
        $this->showRecipe = Recipe::first();
        $this->lib = $this->showRecipe->libelle;
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
            'libelle' => 'required',
            'ingredients'=>'required',
            'preparations'=>'required'
        ]);
         Recipe::create(['libelle' => $this->libelle,
                         'ingredients'=>$this->ingredients,
                         'preparations'=>$this->preparations,
                         ]);
        $this->add = true;
        if(  $this->add){
            $this->refresh();
            session()->flash('success','Recipe added successfuly!');
            $this->reset('libelle');
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

    public function edit(int $id){
        $record =Recipe::findOrfail($id);

        $this->selectedId  =$id;
        $this->libelle  =$record->libelle;
        $this->ingredients  =$record->ingredients;
        $this->preparations  =$record->preparations;
        $this->updateMode = true;

    }


    public function update(){
        $this->validate([
            'libelle' => 'required',
            'ingredients'=>'required',
            'preparations'=>'required'
        ]);
            if( $this->selectedId){
                $record = Recipe::find($this->selectedId);
            session()->flash('success','Recipe updated successfuly!');
            $record->update([
                'libelle'=>$this->libelle,
                'ingredients'=>$this->ingredients,
                'preparations'=>$this->preparations
            ]);

            $this->reset('libelle');
            $this->reset('ingredients');
            $this->reset('preparations');
            $this->updateMode = false;

}
    }

    public function destroy(int $id){
       if($id){
           $recip =Recipe::where('id',$id);
           $recip->delete();
           $this->refresh();
       }
       session()->flash('delete','Recipe removed successfuly!');
    }


    public function searchBylibelle(string $searchBylib){
        $plat = Recipe::all();

        $filtered =$plat->filter(function($value) {
          return $value == $searchBylib;
        });

     dd($filtered);

        $containsPlat = Str::contains($filtered[$searchBylib],$filtered);

    }



}
