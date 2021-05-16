<?php

namespace App\Http\Controllers\Admin;

use App\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentController extends Controller
{
    public function index(){
        $comments = comment::with('getUserComment:id,name','getProductComment:id,pr_name')->paginate(10);
        $viewdata = [
            'comments' => $comments
        ];

        return view('admin.comment.index',$viewdata);
    }
    public function delete($action,$id){
        if($action){
            $comment = comment::find($id);
            switch ($action){
                case 'delete':
                    $comment->delete();
                    break;
            }
        }
        return Redirect()->Route('admin.index.comment');
    }
}
