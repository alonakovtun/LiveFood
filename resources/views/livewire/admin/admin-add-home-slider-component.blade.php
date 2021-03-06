<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Add New Slider</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All Sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="AddSlide">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Title</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Title" wire:model="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Subtitle</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Subtitle" wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Link</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-md" placeholder="Link" wire:model="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" class="input-file" wire:model="image">
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-8 control-label h4">Status</label>
                                <div class="col-md-8">
                                   <select class="form-control" wire:model="status">
                                       <option value="0">Inactive</option>
                                       <option value="1">Active</option>
                                   </select>
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