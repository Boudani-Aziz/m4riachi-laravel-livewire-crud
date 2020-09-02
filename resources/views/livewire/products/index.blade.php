<div>
    <h1>Products</h1>
    @if (session("message"))
    <div class="alert alert-success" role="alert">
        {{session("message")}}
    </div>
    @endif
    @include('livewire.products.create')
    @include('livewire.products.edit')
    <div>
        <div class="mb-3 float-left">
            <button class="btn btn-success" wire:click="showForm('add')">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Create New Product
            </button>
        </div>
        <div class="mb-3 float-right">
            <input type="text" placeholder="Search" wire:model="search">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 80px">Photo</th>
                <th scope="col">Name</th>
                <th scope="col" style="width: 100px" class="text-right">Price</th>
                <th scope="col" style="width: 100px" class="text-center">Active</th>
                <th scope="col" style="width: 120px" class="text-center">Create at</th>
                <th scope="col" style="width: 120px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td>
                    <img src="{{$item->photo != '' ? Storage::url($item->photo) : asset('images/no-photo.png')}}"
                        width="60" alt="">
                </td>
                <td>{{$item->name}}</td>
                <td class="text-right">{{$item->price}}</td>
                <td class="text-center">{{$item->active ? 'Yes' : 'No'}}</td>
                <td class="text-center">
                    {{$item->created_at->format('m/d/Y')}}
                    <br>
                    {{$item->created_at->format('h:i')}}
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" wire:click="showForm('edit', {{ $item }})" role="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </button>

                    <button class="btn btn-danger"
                        onclick="if (confirm ('You want really delete this item')) {@this.call('destroy', {{ $item->id }})}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$collection->links()}}
    </div>
</div>
