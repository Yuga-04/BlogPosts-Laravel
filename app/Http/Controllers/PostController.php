<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(Request $request){
    $title="BlogPost";
    // $posts=Post::paginate(5);
    $query=Post::query();


    if($request->has('search') && !empty($request->search)){
      $query->where('title','like','%'.$request->search.'%')
      ->orWhere('content','like','%'.$request->search.'%');
    }
   $posts=$query->paginate(5);


    return view('posts.index',compact('title','posts'));
  }
public function detail($slug)
{
    $post = Post::where('slug', $slug)->first();
    $category=$post->category;
    $related_posts= Post::where('category_id',$category->id)
                    ->where('id','!=',$post->id)
                    ->take(5)
                    ->get();
    abort_if(!$post, 404);

    return view('posts.detail', compact('post','related_posts'));
}




  public function oldurl(){
    return redirect()->route('name');
  }

  public function newurl(){
    return "<h1>Redirected Page</h1>";
  }
}
