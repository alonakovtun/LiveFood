<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Edit User</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.users')}}" class="btn btn-lg btn-circle btn-outline-new-white pull-right">All User</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="updateUser">
                        @csrf
                            <div class="form-group">
                                <div class="col-md-8">
                                <label for="user_role" class="col-md-8 control-label h4">User Role</label>
                                    <select class="form-control" wire:model="user_role">
                                        @foreach(App\Models\User::userRoleList() as $key => $value)
                                        <option value="{{$key}}" >{{$value}}</option>
                                        @endforeach
                                    </select>
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