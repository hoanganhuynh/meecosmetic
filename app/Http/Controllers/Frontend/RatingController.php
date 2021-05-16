<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\RequestComment;
use App\comment;
use App\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function saveRatingStore(Request $request,$id){

        $userCmt = comment::where([
            ['u_id',get_data_user('web')],
            ['pr_id',$id]
        ])->first();

                $comment = new comment();
                $comment->c_comment = $request->c_comment;
                $comment->u_id = get_data_user('web');
                $comment->pr_id = $id;

                $comment->save();

              
            return redirect()->back();
        
        
    }
}
