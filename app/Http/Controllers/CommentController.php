<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\books;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PhotoComment;
use App\Models\ProfileComment;
use App\Models\ProfileCommentContactform;
use App\Models\ProfileCommentLike;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
   public function storeProfileComment(Request $request){
        //dd($request->all());
        $this->validate($request,[
           'comment'=>'required',
           'comment_to_user_id'=>'required'
        ]);
        try{
            $comment =  ProfileComment::create([
                'comment_to_user_id' => crypt::decrypt($request->comment_to_user_id),
                'comment_from_user_id' => Auth::user()->id,
                'comment' => $request->comment,
                'parent_comment_id' => (isset($request->parent_comment_id) && !empty($request->parent_comment_id)) ? crypt::decrypt($request->parent_comment_id) : 0,
           ]);
           $comment_details = ProfileComment::with('fromUser')->with('toUser')->where('id',$comment->id)->first();
            if($comment_details){
                Mail::send('emails.comment', ['comment_details' => $comment_details], function($message) use($comment_details){
                    $message->to($comment_details->toUser->email);
                    $message->subject('Comment');
                    });
            }

        return back()->with('success', 'Your message has been sent successfully');
        }catch(Exception $e){
            //DB::rollBack();
            return back()->with('error','something went wrong!');
        }
    }

    public function storeProfileCommentLike(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'commentId'=>'required',
            ]);

            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages(), 'status' => 422]);
            }

            $getTotalLike = ProfileComment::where('id', $request->commentId)->first();
            $getcommentLike = ProfileCommentLike::where(['commentId' => $request->commentId, 'userId' => auth()->user()->id])->first();
            if (isset($getcommentLike)) {
                ProfileCommentLike::where(['commentId' => $request->commentId, 'userId' => auth()->user()->id])->delete();
                ProfileComment::where('id', $request->commentId)->update([
                    'totalLike' => $getTotalLike->totalLike - 1
                ]);
                $TotalLike = ProfileComment::with('getCommentLikeByUser')->where('id', $request->commentId)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Unlike successfully',
                    'data' => $TotalLike
                ], Response::HTTP_OK);
            } else {
                ProfileCommentLike::create([
                    'commentId' => $request->commentId,
                    'userId' => auth()->user()->id,
                ]);
                ProfileComment::where('id', $request->commentId)->update([
                    'totalLike' => $getTotalLike->totalLike + 1
                ]);
                $TotalLike = ProfileComment::with('getCommentLikeByUser')->where('id', $request->commentId)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Add like successfully',
                    'data' => $TotalLike
                ], Response::HTTP_OK);
            }


        } catch (Exception $e) {
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function storePhotoComment(Request $request){
        //dd($request->all());
        $this->validate($request,[
           'comment'=>'required',
           'photo_id'=>'required'
        ]);
        try{
            $comment =  PhotoComment::create([
                'photo_id' => crypt::decrypt($request->photo_id),
                'user_id' => Auth::user()->id,
                'comment' => $request->comment,
                //'parent_comment_id' => (isset($request->parent_comment_id) && !empty($request->parent_comment_id)) ? crypt::decrypt($request->parent_comment_id) : 0,
           ]);
           $data = [];
           if($comment->id){
                $comment_details = PhotoComment::with('user')->where('id',$comment->id)->first();
                $data['comment_details'] = [
                    'comment'=> $comment_details->comment,
                    'photo_id'=> $comment_details->photo_id,
                    'user_name'=> $comment_details->user->name,
                    'category_name'=> $comment_details->user->category->name,
                    'profile_url'=> url('/profile/'.$comment_details->user->category->slug.'/'.$comment_details->user->name_slug),
                    'profile_img'=> url('/img/user/profile-image/'.$comment_details->user->userDetails->profile_image),
                    'created_at'=> Carbon::parse(now())->diffInDays(Carbon::parse($comment->created_at)),
                ];
                //dd($comment_details->photo->user->email);die;
                if($comment_details){
                    //dd($comment_details->photo->user->email);die;
                    Mail::send('emails.photo_comment', ['comment_details' => $comment_details], function($message) use($comment_details){
                        $message->to($comment_details->photo->user->email);
                        $message->subject('Comment');
                        });
                }
           }
           //dd($data);
        return response()->json($data);
        //return back()->with('success', 'You comment send successfully');
        }catch(Exception $e){
            //DB::rollBack();
            return back()->with('error','something went wrong!'.$e);
        }
    }

    public function storeCommentContactFrm(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'note'=>'required',
         ]);
         try{
             $contact_frm =  ProfileCommentContactform::create([
                 'user_id' => crypt::decrypt($request->user_id),
                 'name' => $request->name,
                 'email' => $request->email,
                 'note' => $request->note,
            ]);
            $comment_details = ProfileCommentContactform::with('user')->where('id',$contact_frm->id)->first();
             if($comment_details){
                 Mail::send('emails.comment', ['comment_details' => $comment_details], function($message) use($comment_details){
                     $message->to($comment_details->user->email);
                     $message->subject('Massage');
                     });
             }

         return back()->with('success', 'You massage send successfully');
         }catch(Exception $e){
             //DB::rollBack();
             return back()->with('error','something went wrong!');
         }
    }
}
