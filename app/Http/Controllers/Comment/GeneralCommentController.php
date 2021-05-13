<?php

namespace App\Http\Controllers\Comment;

use App\GeneralComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class GeneralCommentController extends Controller
{
    public function Store(Request $request,$id)
    {
        $comment = new GeneralComment();
        $comment->content = $request->get('content');
        $comment->commendable_type = $request->get('commendable_type');
        $comment->commendable_id = $request->get('commendable_id');
        $comment->user_id = $request->get('user_id');
        $comment->save();
        return redirect(URL::previous())->with('success', 'Successfully Inserted Data!');


    }
}
