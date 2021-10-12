<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Edit Category</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label h4">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Category Name" wire:model="name" wire:keyup="generateSlug">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label h4">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Category Slug" wire:model="slug">
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