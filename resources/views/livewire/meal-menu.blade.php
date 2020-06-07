<div wire:poll.1s>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"> <img src="{{asset('images/logo.png')}}" alt="" height="60" width="60"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
            <a class="nav-link text-light" href="#" >Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Apropos</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </nav>

    <div class="p-1 mr-2">
        <div class="d-flex flex-row bd-highlight  mt-3">
            <div class="p-2 m-2 shadow p-3 mb-5 bg-white align-content-sm-start border col-md-3" style="height: 600px;">
                <form class="form-group">
                    <fieldset>

                        <legend class="text-center rounded p-1 m-1 bg-success text-light">Ajouter un menu</legend>
                    <div class="form-group">
                        <input type="text" wire:model.lazy="recipe" class="form-control" placeholder="Nom du plat">
                       @error('recipe') <span class="error " style="color:red">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                    <textarea name="" id="" cols="10" wire:model.lazy="ingredients" rows="5" class="form-control" placeholder="ingredient"></textarea>
                        @error('ingredients')<span class="error" style="color:red">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                    <textarea name="" id="" cols="10" wire:model.lazy="preparations" rows="5" class="form-control" placeholder="preparations"></textarea>
                    @error('preparations')<span class="error" style="color:red">{{$message}}</span>@enderror
                    </div>
                <div class="form-group"> <button type="button" wire:click="addRecipe()" class="btn btn-outline-info btn-sm btn-block">Enregister</button></div>
                </fieldset>
                </form>
            </div>

            <div class="p-2 align-content-sm-center  col-md-4"> <div class="card">
                <div wire:loading wire:target="destroy">
                    Processing remove recipe...
                </div>
            @if(session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('delete')}}
            </div>
            @endif
            <div class="card-header  bg-info text-center">
                <h5 class="text-center text-light">LISTES DES MENUS</h5>
            </div>
            <div class="card-body">
                        <ul class="list-group">
                            @foreach ($recipes as $key =>$recipe)
                                <li class="list-group-item ">{{$recipe->libelle}}

                                    <button class="btn btn-danger float-right mr-2" wire:click="destroy({{$recipe->id}})">
                                        <svg class="bi bi-trash-fill " width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </button>
                                    <button wire:click="show({{$recipe->id}})" class="float-right btn btn-warning  mr-2">
                                        <svg class="bi bi-pencil-square light" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                            </svg>
                                    </button>
                                    <button wire:click="show({{$recipe->id}})" class="float-right btn btn-info  mr-2">
                                        <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
            </div>
        </div>
        </div>
        <div class="p-2 align-content-sm-end" style="height: 500px">
           <div class="row border p-1 shadow p-3 mb-5 bg-white rounded">
               <div class="col-md-12 border m-2 p-2 bg-primary rounded text-light"><h3 class="text-center ">Nom du menu:{{$libelle}}</h3></div>
            <div class="col-md-6 border p-2">
               <div class="col-md-12 m-1 rounded p-1 bg-danger ">
                <h4 class="text-center text-light">Ingredients</h4>
               </div>
                                        @foreach ($inArray as $ingredient)
                                                <li class="ml-4">{{$ingredient}}</li>
                                        @endforeach
            </div>
            <div class="col-md-6 border p-2">
               <div class="col-md-12 rounded p-1 m-1 bg-warning">
                <h4 class="text-center text-light">Preparations</h4>
               </div>
                                       <ol>
                                        @foreach ($prepaArray as $prepa)
                                            <li>{{$prepa}}</li>
                                            <hr>
                                         @endforeach
                                       </ol>
            </div>
           </div>
            {{-- <div class="card-group">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <img src="{{asset('images/recipe.jpg')}}" class="card-img-top" alt="..." height="200", width="100">
                            <div class="card-body">

                                <div class="card-header text-center bg-info">
                                    <h5 class="card-title bg-info text-center">{{$libelle}}</h5>
                                </div>
                            <div class="card mt-5 mb-3 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="card-header text-center ">
                                    <h5>Ingredients</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($inArray as $ingredient)
                                                <ol class="list-group-item">{{$ingredient}}</ol>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="card-header text-center ">
                                <h5>Preparations</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($prepaArray as $prepa)
                                            <ol class="list-group-item">{{$prepa}}</ol>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            </div>
                    </div>
            </div> --}}
        </div>

</div>

    </div>

</div>
