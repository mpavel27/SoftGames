<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\Api\ApiController;
use Facade\FlareClient\Api;

class CreateProductGameType extends Component
{
    public $nestsSelected = false;
    public $eggsSelected = false;
    public $allocationSelected = false;
    public $eggs = [];
    public $eggsVariables = [];

    public function render()
    {
        $pterodactyl = new ApiController();
        $nests = $pterodactyl->getApplicationData('nests');
        $locations = $pterodactyl->getApplicationData('nodes');
        return view('livewire.create-product-game-type', compact(['nests', 'locations']));
    }

    public function changeNest($id) {
        if($id < 0) {
            $this->nestsSelected = false;
            $this->eggsSelected = false;
            return;
        }
        $this->eggsSelected = false;
        $this->eggsVariables = json_encode([]);
        $pterodactyl = new ApiController();
        $this->nestsSelected = true;
        $this->eggs = $pterodactyl->getEggsByNests($id)->data;
    }

    public function changeEgg($id) {
        if($id < 0) {
            $this->nestsSelected = false;
            $this->eggsSelected = false;
            return;
        }
        $this->eggsVariables = json_encode([]);
        $this->eggsSelected = true;
        $this->eggsVariables = json_decode(json_encode ( $id ) , true);
    }

    public function changeAllocation($id) {
        if($id < 0) {
            $this->allocationSelected = false;
            return;
        }
        $this->allocationSelected = true;
    }
}
