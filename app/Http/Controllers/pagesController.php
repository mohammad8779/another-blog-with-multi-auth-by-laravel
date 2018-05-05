<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Post;
use Mail;
use Session;
class pagesController extends Controller
{
    //for home page
    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    
    //for about page
    public function getAbout(){
        return view('pages.about');
    }
    
    //for contact page
    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data){

            $message->from($data['email']);
            $message->to('matalukder94@gmail.com');
            $message->subject($data['subject']);
            
        });


        Session::flash('success', 'Your Email was Sent!');
        return redirect('/');
        
    }
}
