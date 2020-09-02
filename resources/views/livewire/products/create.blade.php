<div class="mb-3 border p-3 {{$mode['add']? '' : 'd-none'}}">
    <form wire:submit.prevent="store">
        <div class="form-row">
            <div class="col-md-8 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('product.name') is-invalid @enderror" id="name"
                    placeholder="Product Name" wire:model="product.name">
                @error('product.name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationServer05">Price</label>
                <input type="text" class="form-control @error('product.price') is-invalid @enderror"
                    id="validationServer05" placeholder="10.99" wire:model="product.price">
                @error('product.price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control-file @error('product.photo') is-invalid @enderror" id="photo"
                wire:model="product.photo">
            @error('product.photo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input @error('product.active') is-invalid @enderror" type="checkbox" value="1"
                    id="active" wire:model="product.active">
                <label class="form-check-label" for="active">
                    Active this product
                </label>
                @error('product.active')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-secondary" type="button" wire:click.prevent="resetItem">Cancel</button>
    </form>
</div>
