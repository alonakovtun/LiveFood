<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>All Users</h1>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                        <table class="table tabel-striped text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="hide_row">Email</th>
                                    <th class="hide_row-first">Password</th>
                                    <th>Role</th>
                                    <th class="hide_row">Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td class="hide_row">{{$user->email}}</td>
                                    <td class="hide_row-first">{{$user->password}}</td>
                                    <td >{{$user->utype}}</td>
                                    <td class="hide_row">{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.edituser',['user_id'=>$user->id])}}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$user->id}})">
                                            <i class="fa fa-times fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>