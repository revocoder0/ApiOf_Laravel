<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
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
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('post.index', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $post = Post::all();
        return view('post.create', compact('categories', 'post'));
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
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                $image->setAttribute('src');
            }
            $description = $dom->saveHTML();
            //end Summernote photo and video
            $short_description = $request->short_description;
            $status = $request->status;
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
        return redirect()->back()->with('success', 'Post inserted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        $posts = Post::findorFail($id);
        $categories = Category::all();
        return view('post.edit', compact('posts', 'categories'));
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
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $status = $request->status;
        $category = $request->category;

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
        if (isset($post->feature)) {
            $oldname = $post->feature;
            File::delete($path . '' . $oldname);
        }
        $post->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
    public function deleteCheckedPosts(Request $request)
    {
        $post_ids = $request->post_ids;
        Post::whereIn('id', $post_ids)->delete();
        return response()->json(['success' => "Posts have been deleted!"]);
    }
}
