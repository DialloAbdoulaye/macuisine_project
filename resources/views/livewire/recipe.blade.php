<div>
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
              CUISINE MENU
          </div>
          <div class="col-md-6">

                  <form action="">
                    <fieldset>
                           <legend>Ajouter un plat</legend>
                            <input type="text" class="form-control mb-4">
                            <button class="btn btn-primary">
                                AJOUTER UN MENU
                            </button>
                    </fieldset>
                 </form>


          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-5">
              <ul class="list-group">
                  @foreach ($recipes as $recipe)
                         <li class="list-group-item active">$recipe</li>
                  @endforeach
                </ul>
            </div>
            <div class="col-md-6">
              <div class="card-group">
                  <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title bg-info">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
            </div>
        </div>
</div>


</div>
