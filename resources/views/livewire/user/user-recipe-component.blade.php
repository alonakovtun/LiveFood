<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>All Recipes</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.addrecipe')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">Add New Recipe</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <table class="table tabel-striped text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Recipe Name</th>
                                    <th>Category</th>
                                    <th class="hide_row">Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recipes as $recipe)
                                <tr>
                                    <td><img src="{{ asset('assets/images/recipes')}}/{{$recipe->image}}" width="60"></td>
                                    <td>{{$recipe->name}}</td>
                                    <td>{{$recipe->category->name}}</td>
                                    <td class="hide_row">{{$recipe->created_at}}</td>
                                    <td>
                                        <a href="{{route('user.editrecipe',['recipe_slug'=>$recipe->slug])}}" >
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this recipe?') || event.stopImmediatePropagation()" wire:click.prevent="deleteRecipe({{$recipe->id}})">
                                            <i class="fa fa-times fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$recipes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>