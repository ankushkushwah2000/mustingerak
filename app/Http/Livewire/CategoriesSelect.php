<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Livewire\Component;


class CategoriesSelect extends Component
{
    public $categories;
    public $subcategories;
    public $subsubcategories;

    public $selectedCategory;
    public $selectedSubCategory;
    public $selectedSubSubCategory;


    public function updatedSelectedCategory($value)
    {
        $this->subcategories = SubCategory::where("category_id", $value)->get();
    }

    public function updatedSelectedSubCategory($value)
    {
        $this->subsubcategories = SubSubCategory::where("sub_category_id", $value)->get();
    }

    public function mount()

    {
        if ($this->selectedCategory) {
            $this->subcategories = SubCategory::where("category_id", $this->selectedCategory)->get();
        }
        if ($this->selectedSubCategory) {
            $this->subsubcategories = SubSubCategory::where("sub_category_id", $this->selectedSubCategory)->get();
        }
    }


    public function render()
    {

        $this->categories = Category::all();
        return view('livewire.categories-select');
    }
}
