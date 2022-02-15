<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Products;

class CategoryDragAndDrop extends Component
{
    public $groups = [];

    public function mount()
    {
        $this->groups = Categories::ordered()->get();
    }

    public function render()
    {
        return view('livewire.category-drag-and-drop');
    }

    public function updateProductOrder($tasks)
    {
        $groups = collect($tasks)->groupBy('value')->map(function($collection){ return $collection[0]; });

        $taskOrder = 1;
        foreach ($groups as $group) {
            foreach ($group['items'] as $task) {
                $task = Products::findOrFail($task['value']);
                $task->update([
                    'category' => $group['value'],
                    'order_column' => $taskOrder
                    ]);
                    $taskOrder++;
            }
        }

        $this->groups = Categories::ordered()->get();
    }

    public function updateCategoryOrder($items)
    {
        Categories::setNewOrder(collect($items)->pluck('value')->toArray());
        $this->groups = Categories::ordered()->get();
    }

    public function removeProduct($productId) {
        $product = Products::findOrFail($productId);
        $product->delete();
        $this->groups = Categories::ordered()->get();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => "Ai șters cu succes produsul {$product->name}"]);
    }
}
