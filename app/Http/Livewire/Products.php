<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithPagination, WithFileUploads;

    public $product;
    public $search = '';
    public $orderBy = [
        'column' => 'id',
        'direction' => 'desc'
    ];

    //to show create or edit form
    public $mode = [
        'add' => false,
        'edit' => false
    ];

    public function resetItem()
    {
        $this->mode = [
            'add' => false,
            'edit' => false
        ];

        $this->product = [
            'id' => null,
            'name' => '',
            'photo' => null,
            'price' => '',
            'active' => false,
        ];
    }

    public function showForm($mode, $item = null)
    {
        $this->resetItem();

        $this->mode[$mode] = true;

        if (!is_null($item)) {
            $this->product = $item;
        }
    }

    public function order($column)
    {
        if ($this->orderBy['column'] != $column) $direction = 'asc';
        else $direction = ($this->orderBy['direction'] == 'asc') ? 'desc' : 'asc';

        $this->orderBy = [
            'column' => $column,
            'direction' => $direction
        ];
    }

    // Resetting Pagination After Filtering Data to the first page
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.products.index', [
            'collection' => Product::where('name', 'like', '%' . $this->search . '%')->orderBy(...array_values($this->orderBy))->paginate(5)
        ]);
    }

    public function store()
    {
        $this->validate([
            'product.name' => 'required|unique:products,name',
            'product.price' => 'required|numeric',
            'product.photo' => 'required|image',
        ]);

        $this->product['photo'] = ((object) $this->product['photo'])->store('photos', ['disk' => 'public']);

        Product::create($this->product);

        session()->flash('message', 'Item Created Successfully.');

        $this->resetItem();
    }

    public function update()
    {
        $this->validate([
            'product.name' => 'required|unique:products,name,' . $this->product['id'] . ',id',
            'product.price' => 'required|numeric',
            'product.photo' => is_object($this->product['photo']) ? 'image' : '',
        ]);

        //we update the photo just if is not empty
        if (is_object($this->product['photo'])) {
            $this->product['photo'] = ((object) $this->product['photo'])->store('photos', ['disk' => 'public']);
        } else {
            unset($this->product['photo']);
        }

        Product::find($this->product['id'])->update($this->product);

        session()->flash('message', 'Item Updated Successfully.');

        $this->resetItem();
    }

    public function destroy($id)
    {
        Product::destroy($id);

        session()->flash('message', 'Item Deleted Successfully.');

        $this->resetItem();
    }
}
