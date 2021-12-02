@inject('markdown', 'Parsedown')
@php
// TODO: There should be a better place for this.
$markdown->setSafeMode(true);
@endphp

<div id="comment-{{ $comment->getKey() }}" class="media border border-secondary rounded p-3 my-2">
    <img class="mr-3" src="{{asset('assets/images/avt-img.jpg')}}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar" width="70">
    <div class="media-body">
        <div class="h3 font-weight-normal mt-0 mb-1 text-dark">{{ $comment->commenter->name ?? $comment->guest_name }}
            <p class="h6 font-weight-light text-muted float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $comment->created_at->diffForHumans() }}</p>
        </div>
       
        <div class="h5 font-weight-normal text-dark d-flex justify-content-between">
            <p>{!! $markdown->line($comment->comment) !!}</p>
            @if( $comment->created_at != $comment->updated_at)
            <p class="font-weight-light text-muted float-right" style="font-size:13px"><i class="fa fa-clock-o" aria-hidden="true"></i> Updated {{ $comment->updated_at->diffForHumans() }}</p>
            @endif
        </div>
       

        <div class="mt-2">
            @can('reply-to-comment', $comment)
            <button data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="btn btn-dark py-2 px-3">@lang('comments::comments.reply')</button>
            @endcan
            @can('edit-comment', $comment)
            <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="btn btn-info py-2 px-3">@lang('comments::comments.edit')</button>
            @endcan
            @can('delete-comment', $comment)
            <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn btn-danger py-2 px-3">@lang('comments::comments.delete')</a>
            <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
        <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">@lang('comments::comments.edit_comment')</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">@lang('comments::comments.update_your_message_here')</label>
                                <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                            <button type="submit" class="btn btn-sm btn-circle btn-outline-new-white">@lang('comments::comments.update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan

        @can('reply-to-comment', $comment)
        <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">@lang('comments::comments.reply_to_comment')</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                                <textarea required class="form-control" name="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary text-uppercase" data-dismiss="modal">@lang('comments::comments.cancel')</button>
                            <button type="submit" class="btn btn-sm btn-circle btn-outline-new-white">@lang('comments::comments.reply')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan

        <?php
        if (!isset($indentationLevel)) {
            $indentationLevel = 1;
        } else {
            $indentationLevel++;
        }
        ?>

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()) && $indentationLevel <= $maxIndentationLevel) {{-- TODO: Don't repeat code. Extract to a new file and include it. --}} @foreach($grouped_comments[$comment->getKey()] as $child)
            @include('comments::_comment', [
            'comment' => $child,
            'grouped_comments' => $grouped_comments
            ])
            @endforeach
            @endif

    </div>
</div>

{{-- Recursion for children --}}
@if($grouped_comments->has($comment->getKey()) && $indentationLevel > $maxIndentationLevel)
{{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
@foreach($grouped_comments[$comment->getKey()] as $child)
@include('comments::_comment', [
'comment' => $child,
'grouped_comments' => $grouped_comments
])
@endforeach
@endif