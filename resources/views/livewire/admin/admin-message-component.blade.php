<div class="pt-100">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>Messages</h1>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <!-- @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif -->
                        <table class="table tabel-striped text-center">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th class="hide_row">Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->message}}</td>
                                    <td class="hide_row">{{$message->created_at}}</td>
                                    <td>
                                        <button class="btn btn-lg btn-circle btn-outline-new-white " type="button" wire:click.prevent="$emit('showModal', '{{$message->email}}')">Reply</button>

                                        @livewire('admin.admin-modal-component', ['data' => $message])

                    </div>

                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>