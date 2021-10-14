<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Add New Recipe</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.recipes')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All Recipes</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addRecipe">
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Recipe Name" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Slug</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Recipe Slug" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Short Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Short Description" wire:model="short_description">
                                    @error('short_description') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Description" wire:model="description">
                                    @error('description') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="input-file" wire:model="image">
                                    @error('image') <p class="text-danger">{{$message}}</p>  @enderror
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Category</label>
                                <div class="col-md-8">
                                   <select class="form-control" wire:model="category_id">
                                       <option value="">Select Category</option>
                                       @foreach($categories as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endforeach
                                   </select>
                                   @error('category_id') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-8 control-label h4"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-common">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>