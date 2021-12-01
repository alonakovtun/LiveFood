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
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addRecipe">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control all_placeholder" placeholder="Crisp Cookies" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Slug</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md all_placeholder" placeholder="Recipe Slug" wire:model="slug" readonly>
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Category</label>
                                <div class="col-md-8">
                                    <select class="form-control" wire:model="category_id">
                                    <option value="" disabled >Select your category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Ingredients</label>
                                <div class="col-md-8" wire:ignore>
                                    <select class="select2 form-control" multiple="multiple" id="members" placeholder="Select Ingredients">
                                        @foreach($ingredients as $ingredient)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <p class="ml-2">Don't have a required ingredient?</p> 
                                        <a class="text-primary mr-2 font-weight-bold" href="{{ route('admin.addingredient') }}">Add an ingredient!</a>
                                    </div>
                                    @error('ingredients_array') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Short Description</label>
                                <div class="col-md-8" wire:ignore>
                                    <input type="text" class="form-control input-md all_placeholder" id="short_description" placeholder="Briefly describe the recipe" wire:model="short_description">
                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Description</label>
                                <div class="col-md-8" wire:ignore>
                                    <input type="text" class="form-control input-md all_placeholder" id="description" placeholder="Write the recipe step by step ;)" wire:model="description">
                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="input-file img-w mb-2" wire:model="image">
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                </div>
                            </div>
                           

                            <!--  <div class="form-group">
                                <label class="col-md-8 control-label h4">Ingredients</label>
                                <div class="col-md-8" wire:ignore>
                                    <input type="text" class="form-control input-md hhhhhhh" placeholder="Ingredients">
                                    <div id="input0"></div>
                                    <div class="add" onclick="addInput()">+++</div>
                                    @error('ingredients_array') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div> -->

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



@push('scripts')
<script>
    /*  @this.set('ingredients_array', $('.hhhhhhh').val()); */
    $(function() {
        $('.select2').select2({
            placeholder: "Add used ingredients"
        }).on('change', function() {
            @this.set('ingredients_array', $(this).val());
        });
    });
</script>

<script>
     $(function() {
        tinymce.init({
            selector: '#short_description',
            setup: function(editor) {
                editor.on('Change', function(e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description', sd_data);
                })
            }
        })

        tinymce.init({
            selector: '#description',
            setup: function(editor) {
                editor.on('Change', function(e) {
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description', d_data);
                })
            }
        })
    });

</script>
@endpush