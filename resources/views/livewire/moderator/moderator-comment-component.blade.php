<div class="pt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <h1>All Comments</h1>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-shop-control">
                        <div class="wrap-right mb-20">
                            <div class="sort-item orderby">
                                <select name="orderby" class="use-chosen custom-select" wire:model="sorting">
                                    <option value="default" >Default sorting</option>
                                    <option value="date-new">Sort by newness</option>
                                    <option value="date-old">Sort by oldest</option>
                                </select>
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
                                    <th>User Id</th>
                                    <th>Comment</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->commenter_id}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>
                                        <a href="#" onclick="confirm('Are you sure, You want to delete this comment?') || event.stopImmediatePropagation()" wire:click.prevent="deleteComment({{$comment->id}})">
                                            <i class="fa fa-times fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$comments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>