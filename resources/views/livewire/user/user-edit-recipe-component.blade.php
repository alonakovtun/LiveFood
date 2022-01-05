<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Edit Recipe</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.recipes')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All Recipes</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateRecipe">
                        @csrf
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
                                <label class="col-md-8 control-label h4">Short Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" id="short_description" placeholder="Short Description" wire:model="short_description">
                                    @error('short_description') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Description</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" id="description" placeholder="Description" wire:model="description">
                                    @error('description') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="input-file img-w mb-2" wire:model="newimage">
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="120">
                                    @else
                                    <img src="{{asset('assets/images/recipes')}}/{{$image}}" width="120">
                                    @endif
                                    @error('newimage') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-8 control-label h4"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-common">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:  '#description',
            setup: function(editor){
                editor.on('Change', function(e){
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description', d_data);
                })
            }
        })
    });
</script>
@endpush