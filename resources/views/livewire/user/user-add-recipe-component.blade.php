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
                            @csrf
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Recipe Name" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Slug</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Recipe Slug" wire:model="slug" readonly>
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Short Description</label>
                                <div class="col-md-8" wire:ignore>
                                    <input type="text" class="form-control input-md" id="short_description" placeholder="Short Description" wire:model="short_description">
                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Description</label>
                                <div class="col-md-8" wire:ignore>
                                    <input type="text" class="form-control input-md" id="description" placeholder="Description" wire:model="description">
                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Recipe Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="input-file" wire:model="image">
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
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
                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group" wire:ignore>
                                <label class="col-md-8 control-label h4">Ingredients</label>
                                <div class="col-md-8">
                                    <select multiple id="choices-multiple-remove-button" wire:model="ingredients_array">
                                        @foreach($ingredients as $ingredient)
                                        <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-12 mb-3" wire:ignore>
                                <label for="locationUsers">Select Users</label>
                                <select id="locationUsers" class="form-control select2" multiple="multiple">
                                    <option value="">--select--</option>
                                    @foreach($ingredients as $ingredient)
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- 111<div class="form-group col-md-6" wire:ignore>
                                <label for="manager" class="mb-0 h5">Assign Managers:</label>
                                <select wire:model="ingredients_array" id="manager" class="select-2" multiple='multiple' data-placeholder=" Assign Managers">
                                    @foreach($ingredients as $ingredient)
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
 -->
                            <!--  <div class="col d-flex display-inline-block">
                                <label>Device</label>
                                <select wire:model="selectedItem" class="form-control contact_devices_multiple" multiple="multiple" data-placeholder="Select" style="width: 100%;">
                                    @foreach($ingredients as $ingredient)
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endforeach
                                </select>
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




<script>
    /* $('.selectpicker').selectpicker(); */
    //     $(document).ready(function(){

    // var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
    // removeItemButton: true,

    // });


    // });
    /* 111$('#manager').on('select2:select', function(e) {
        @this.set('ingredients_array', $('#manager').select2());
    });
    $('#manager').on('select2:unselect', function(e) {
        @this.set('ingredients_array', $('#manager').select2());
    }); */
    /* document.addEventListener("livewire:load", () => {
        Livewire.hook('message.processed', (message, component) => {
            $('.js-example-basic-multiple').select2()

        });
    }); */
    /*  var array = json_encode($ingredients_array);
    $(document).ready(function() {

        $('#select_ingredients').select2({
        });
       /*  $("#select_ingredients").on("select2:select", function (e) { 
        var select_val = $(e.currentTarget).val();
        console.log(select_val)
        }); 
    }); */
    /* document.addEventListener('livewire:load', function() {
            $('#locationUsers').on('select2:close', (e) => {
                @this.emit('locationUsersSelected', $('#locationUsers').select2('val'));
            });

            $('#locationUsers').val(@this.get('locationUsers')).trigger('change');
        });
    }); */

    /* $(function() {
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
        }) */

    /* $('#select_ingredients').select2(); */

    /*  window.loadContactDeviceSelect2 = () => {
         $('.contact_devices_multiple').select2().on('change', function() {
             livewire.emitTo('contact-component', 'selectedItemChange', $(this).val());
         });
     }
     loadContactDeviceSelect2();
     window.livewire.on('loadContactDeviceSelect2', () => {
         loadContactDeviceSelect2();
     }); */


    /* }); */

    document.addEventListener('livewire:load', function() {
      /*   $('#locationUsers').on('select2:select', (e) => {
            @this.emit('locationUsersSelected', $('#locationUsers').select2('val'));
            $('#locationUsers').val(@this.get('locationUsers')).trigger('change');
        }); */
        $('#locationUsers').on('select2:select', (e) => {
            @this.emit('locationUsersSelected', $('#locationUsers').select2('val'));
        });
    });
</script>