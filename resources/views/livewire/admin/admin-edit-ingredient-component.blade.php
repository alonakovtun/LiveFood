<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Edit Ingredient</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.ingredients')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All Ingredients</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="updateIngredient">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label h4">Ingredient Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Ingredient Name" wire:model="name">
                                    @error('name') <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label h4"></label>
                                <div class="col-md-4">
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