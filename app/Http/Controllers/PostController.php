<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $tags = Tags::all('id', 'tags');
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('post.index', compact('posts', 'users', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('post.create')->with('categories', Category::all())->with('tags', Tags::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        if ($request->hasFile('feature')) {
            $title = $request->title;
            $description = $request->description;
            //For Summernote photo and video
            $dom = new \DomDocument();
            @$dom->loadHTML('<?xml encoding="UTF-8">' . $description);
        $description = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $description .= $dom->saveHTML($dom->documentElement);
            $imageFile = $dom->getElementsByTagName('imageFile');

            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                // $imgeData = base64_decode($data);
                $image_name = "/storage/uploads/" . time() . $item . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src');
            }
            $description = $dom->saveHTML();
            //end Summernote photo and video
            $short_description = $request->short_description;
            if($request->get('status') == null){
                $status = 0;
              } else {
                $status = request('status');
              }
            $category = $request->category;

            $feature = $request->file('feature');
            $path = public_path('/storage/uploads/');
            $name = time() . "." . $feature->getClientOriginalExtension();
            $feature->move($path, $name);
        }


        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->short_description = $short_description;
        $post->status = $status;
        $post->category_id = $category;
        $post->feature = $name;
        $post->user_id = Auth::user()->id;
        $post->save();
        if($request->tags){
          $post->tags()->attach($request->tags);
        }
        return redirect()->back()->with('success', 'Post inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Post $post)
    {
        if ($post = Post::find($id)) {
            return view('post.detials', compact('post'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Post $post)
    {
        
        
        $posts=Post::findorFail($id)->load('tags');
        $categories =  Category::all();
        $tags = Tags::all('id', 'tags');
        return view('post.edit', compact('posts', 'categories', 'tags' ));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $title = $request->title;
        $description = $request->description;
        //For summernote photo and video
        $dom = new \DomDocument('1.0', 'UTF-8');
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $description);
        $description = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $description .= $dom->saveHTML($dom->documentElement);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/storage/uploads/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();
        //end summernote photo and video
        $short_description = $request->short_description;
        if($request->get('status') == null){
            $status = 0;
          } else {
            $status = request('status');
          }
        $category = $request->category;
        $created_at = $request->created_at;

        $post = Post::findorFail($id);
        if ($request->hasFile('feature')) {
            $feature = $request->file('feature');
            $path = public_path('/storage/uploads/');
            $name = time() . "." . $feature->getClientOriginalExtension();
            $feature->move($path, $name);


            if (isset($post->feature)) {
                $oldname = $post->feature;
                File::delete($path . '' . $oldname);
            }
            $post->feature = $name;
        }
        $post->title = $title;
        $post->description = $description;
        $post->short_description = $short_description;
        $post->status = $status;
        $post->category_id = $category;
        $post->created_at = $created_at;
        if($request->tags){
            $post->tags()->sync($request->tags);
          }
        $post->save();
        return redirect()->back()->with('success', 'Post Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        $post = Post::findOrFail($id);
        $path = public_path('/storage/uploads/');
        if(isset($post->feature)){
            $oldname = $post->feature;
            File::delete($path. '' . $oldname);
        }
        if (Post::where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'Record Delete Successfully!');
         }else{
              return redirect()->back();
         }
    }
    public function deleteCheckedPosts(Request $request)
    {
        $post_ids = $request->post_ids;
        Post::whereIn('id', $post_ids)->delete();
        return response()->json(['success' => "Posts have been deleted!"]);
    }
}
