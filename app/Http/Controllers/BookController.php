<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
   public function storeBook(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'preferred_date' => 'required',
            'description' => 'required',
            'booked_id' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:booking,0.5'
        ]);
        try{
            $booking = Books::create([
                'booked_user_id' => Crypt::decrypt($request->booked_id), 
                'user_id' => @Auth::user()->id ? @Auth::user()->id : 0, 
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_no'=>$request->phone_no,
                'preferred_date'=>$request->preferred_date,
                'preferred_time'=>$request->preferred_time,
                'street_address'=>$request->street_address,
                'country_id'=>$request->country_id,
                'state_id'=>$request->state_id,
                'city'=>$request->city,
                'zip_code'=>$request->zip_code,
                'description'=>$request->description,
            ]);
            $bookings_details = Books::with('bookingUser')->with('country')->with('state')->where('id',$booking->id)->first();
            if($bookings_details){
                Mail::send('emails.booking', ['bookings_details' => $bookings_details], function($message) use($bookings_details){
                    $message->to($bookings_details->bookingUser->email);
                    $message->subject('Booking');
                    });
            }
        return back()->with('success', 'You successfully created your booking');
        }catch(Exception $e){
            //DB::rollBack();
            return back()->with('error','something went wrong!');
        }
    }
    public function calendarBookingList(Request $request){
        //dd($request->all());
        //if($request->ajax()) {  
        $data = Books::whereDate('preferred_date', '>=', $request->start)
            ->whereDate('preferred_date',   '<=', $request->end)
            ->select('created_at as start','created_at as start','name as title')
            ->get();
        //dd($data);die;
        return response()->json($data);
        //}
    }
}
