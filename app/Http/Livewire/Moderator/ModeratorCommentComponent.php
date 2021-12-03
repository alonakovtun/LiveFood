<?php

namespace App\Http\Livewire\Moderator;

use Laravelista\Comments\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ModeratorCommentComponent extends Component
{
    use WithPagination;

    public $sorting;

    public function mount(){
        $this->sorting = "default";
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('message', 'Comment has been deleted successfully!');
    }

    public function render()
    {
        if($this->sorting == 'date-new'){
            $comments = Comment::orderBy('created_at', 'DESC')->paginate(10);
        }else if($this->sorting == 'date-old'){
            $comments = Comment::orderBy('created_at', 'ASC')->paginate(10);
        }else{
            $comments = Comment::paginate(10);
        }

        return view('livewire.moderator.moderator-comment-component', ['comments'=>$comments])->layout('layouts.base');
    }
}
