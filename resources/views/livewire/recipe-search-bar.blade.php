<div>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2"
        type="search"
         wire:model.debounce.500="query"
         wire:keydown.escape="resetfunction"
         wire:keydown.tab='resetfunction'

        placeholder="Search"
        aria-label="Search"

        >
        <button class="btn btn-outline-warning my-2 my-sm-0"
         wire:click="search()">Search</button>
    </form>
    <div class="absolute bg-white0 rounded w-64" wire:loading>
        Recherche ...
    </div>
           @if(!empty($query))
                    @if (!empty($recipes))
                    <div class="absolute bg-white0 rounded w-64">
                        <ul>
                            @foreach ($recipes as $item)
                                        <li class="border-b border-gray-700">
                                            <button wire:click="show({{$item->id }}})" class="btn btn-sm btn-block">{{ $item->libelle}}</button>
                                        </li>
                            @endforeach

                        </ul>
                    </div>
                        @else
                        <div class="list-item">pas de plat trouvé</div>
                    @endif
           @endif
</div>
