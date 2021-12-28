<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>All Ingredients</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.addingredient')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">Add New Ingredient</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table class="table tabel-striped table_ingredients text-center">
                            <thead>
                                <tr>
                                    <th>Ingredients Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingredients as $ingredient)
                                <tr>
                                    <td>{{$ingredient->name}}</td>
                                    <td>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this ingredient?') || event.stopImmediatePropagation()" wire:click.prevent="deleteIngredient({{$ingredient->id}})">
                                            <i class="fa fa-times fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$ingredients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>