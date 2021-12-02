<?php

namespace App\Http\Livewire\Moderator;

use Laravelista\Comments\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ModeratorCommentComponent extends Component
{
    use WithPagination;

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('message', 'Comment has been deleted successfully!');
    }

    public function render()
    {
        $comments = Comment::paginate(10);
        return view('livewire.moderator.moderator-comment-component', ['comments'=>$comments])->layout('layouts.base');
    }
}
