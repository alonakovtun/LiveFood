<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>All Recipes</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addrecipe')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">Add New Recipe</a>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                    <!-- @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif -->
                        <table class="table tabel-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Recipe Name</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recipes as $recipe)
                                <tr>
                                    <td>{{$recipe->id}}</td>
                                    <td><img src="{{ asset('assets/images/recipes')}}/{{$recipe->image}}" width="60"></td>
                                    <td>{{$recipe->name}}</td>
                                    <td>{{$recipe->category->name}}</td>
                                    <td>{{$recipe->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editrecipe',['recipe_slug'=>$recipe->slug])}}" >
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="#" wire:click.prevent="deleteRecipe({{$recipe->id}})">
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