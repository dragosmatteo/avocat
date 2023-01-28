<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    use traits\TranslateFunctions;
    use traits\ImageFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $blogs = Blog::orderBy('order','asc')->get();


      return view('cpanel.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $types = Type::all();

      return view('cpanel.blogs.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
      $request->validate([
          'image' => 'required',
          'slug' => 'required|unique:blogs'
      ]);

      $data = $request->all();

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('blogs/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('blogs/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('blogs/sm', $name.'.jpg');
        $path_jpg_thumb = $request->file('image')->storeAs('blogs/thumbs', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);
        $img_thumb = Image::make('files/'.$path_jpg_thumb);

        $this->resizeImage($img_lg, 'blogs/lg' , $name, 1920, 1080, 90);
        $this->resizeImage($img_md, 'blogs/md' , $name, 1280, 1024, 90);
        $this->resizeImage($img_sm, 'blogs/sm' , $name, 1024, 768, 90);
        $this->resizeImage($img_thumb, 'blogs/thumbs' , $name, 800, 1000, 90);
      }

      $data = $this->makeJson($data);

      $result = $blog->create($data);

      return redirect()->route('blogs.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
      $types = Type::all();

      return view('cpanel.blogs.edit',compact('blog','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      if ($request->missing(['name','title','body'])) {
        $data = json_decode($blog, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $blog->update($data);
        return back();
      }

      $request->validate([
        'slug' => [
            'required',
            Rule::unique('blogs')->ignore($blog->id),
        ]
      ]);

      $data = $request->all();

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('blogs/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('blogs/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('blogs/sm', $name.'.jpg');
        $path_jpg_thumb = $request->file('image')->storeAs('blogs/thumbs', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);
        $img_thumb = Image::make('files/'.$path_jpg_thumb);

        $this->resizeImage($img_lg, 'blogs/lg' , $name, 1920, 1080, 90);
        $this->resizeImage($img_md, 'blogs/md' , $name, 1280, 1024, 90);
        $this->resizeImage($img_sm, 'blogs/sm' , $name, 1024, 768, 90);
        $this->resizeImage($img_thumb, 'blogs/thumbs' , $name, 800, 1000, 90);

        Storage::delete('blogs/sm/'.$blog->image.'.jpg');
        Storage::delete('blogs/sm/'.$blog->image.'.webp');
        Storage::delete('blogs/md/'.$blog->image.'.jpg');
        Storage::delete('blogs/md/'.$blog->image.'.webp');
        Storage::delete('blogs/lg/'.$blog->image.'.jpg');
        Storage::delete('blogs/lg/'.$blog->image.'.webp');
        Storage::delete('blogs/thumbs/'.$blog->image.'.jpg');
        Storage::delete('blogs/thumbs/'.$blog->image.'.webp');
      }

      $data = $this->makeJson($data);

      $result = $blog->update($data);

      return redirect()->route('blogs.edit',$blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
      Storage::delete('blogs/sm/'.$blog->image.'.jpg');
      Storage::delete('blogs/sm/'.$blog->image.'.webp');
      Storage::delete('blogs/md/'.$blog->image.'.jpg');
      Storage::delete('blogs/md/'.$blog->image.'.webp');
      Storage::delete('blogs/lg/'.$blog->image.'.jpg');
      Storage::delete('blogs/lg/'.$blog->image.'.webp');
      Storage::delete('blogs/thumbs/'.$blog->image.'.jpg');
      Storage::delete('blogs/thumbs/'.$blog->image.'.webp');

      $blog->delete();

      return redirect()->route('blogs.index');
    }
}
