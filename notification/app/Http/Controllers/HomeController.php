<?php

namespace App\Http\Controllers;

use App\Events\ViewedPosstEvent;
use App\Models\Post;
use App\Models\User;
use App\Notifications\ViewPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post=Post::all();
        return view('home',["reviews" => $post]);
    }
    function detail($id){
        $post = Post::find($id);
        ViewedPosstEvent::dispatch(auth()->user(),$post);
        return view("detail",["post" => $post]);

    }
    function nontification(){
        $user= User::find(Auth::id());
        return view("nontification", ["user" => $user->unreadNotifications]);
    }
    function add(){
        return view("addPost");
    }
    public function store(Request $request){
//        echo "<pre>";
//        print_r($request->all());
//        echo "</pre>";
//        exit;
        $input = $request->all();
        $review = new Post();
        $review["name"] = $input["name"];
        $review["content"] = $input["content"];
        $review["num_view"]=0;
        $review["user_id"]=Auth::id();
        $review->save();
        return redirect()->route("home");
    }
}
