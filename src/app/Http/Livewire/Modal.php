<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $selectedPrice = '';
    public $showModal =false;

    public function updatedSelectedPrice($value)
    {
        if($value){
            $this->showModal =true;
        }else{
            $this->showModal =false;
        }
    }
    public function closeModal(){
        $this->showModal=false;
    }
    public function render()
    {
        return view('livewire.modal');
    }
}
