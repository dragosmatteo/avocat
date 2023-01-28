<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Type;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Validation\Rule;

class WorkController extends Controller
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
      $works = Work::orderBy('order','asc')->get();

      return view('cpanel.works.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $testimonials = Testimonial::all();
      $types = Type::all();

      return view('cpanel.works.create',compact('testimonials','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Work $work)
    {
      $request->validate([
          'image' => 'required',
          'slug' => 'required|unique:works'
      ]);

      $data = $request->all();

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('works/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('works/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('works/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'works/lg' , $name, 1200, 1200, 90);
        $this->resizeImage($img_md, 'works/md' , $name, 1000, 1000, 90);
        $this->resizeImage($img_sm, 'works/sm' , $name, 800, 800, 90);
      }

      if ($request->file('files')) {
        foreach ($request->file('files') as $key => $image) {
          $name = (string)\Str::uuid();
          $data['images'][] = $name;

          $path_lg = $image->storeAs('works/lg', $name.'.jpg');
          $path_md = $image->storeAs('works/md', $name.'.jpg');
          $path_sm = $image->storeAs('works/sm', $name.'.jpg');

          $img_lg = Image::make('files/'.$path_lg);
          $img_md = Image::make('files/'.$path_md);
          $img_sm = Image::make('files/'.$path_sm);

          $this->resizeImage($img_lg, 'works/lg' , $name, 1920, null, 90);
          $this->resizeImage($img_md, 'works/md' , $name, 1280, null, 90);
          $this->resizeImage($img_sm, 'works/sm' , $name, 1024, null, 90);
        }
        unset($data['files']);
      }

      $data = $this->makeJson($data);
      $result = $work->create($data);

      return redirect()->route('works.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
      $testimonials = Testimonial::all();
      $types = Type::all();

      return view('cpanel.works.edit',compact('testimonials','types','work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
      if ($request->missing(['name','title','body'])) {
        $data = json_decode($work, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $work->update($data);
        return back();
      }

      $request->validate([
        'slug' => [
            'required',
            Rule::unique('works')->ignore($work->id),
        ]
      ]);

      $data = $request->all();

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('works/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('works/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('works/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'works/lg' , $name, 1200, 1200, 90);
        $this->resizeImage($img_md, 'works/md' , $name, 1000, 1000, 90);
        $this->resizeImage($img_sm, 'works/sm' , $name, 800, 800, 90);

        Storage::delete('works/sm/'.$work->image.'.jpg');
        Storage::delete('works/sm/'.$work->image.'.webp');
        Storage::delete('works/md/'.$work->image.'.jpg');
        Storage::delete('works/md/'.$work->image.'.webp');
        Storage::delete('works/lg/'.$work->image.'.jpg');
        Storage::delete('works/lg/'.$work->image.'.webp');
      }

      if ($request->file('files')) {
        $files_array = json_decode($work, true);
        $data['images'] = $files_array['images'];

        foreach ($request->file('files') as $key => $image) {
          $name = (string)\Str::uuid();
          $data['images'][] = $name;

          $path_lg = $image->storeAs('works/lg', $name.'.jpg');
          $path_md = $image->storeAs('works/md', $name.'.jpg');
          $path_sm = $image->storeAs('works/sm', $name.'.jpg');

          $img_lg = Image::make('files/'.$path_lg);
          $img_md = Image::make('files/'.$path_md);
          $img_sm = Image::make('files/'.$path_sm);

          $this->resizeImage($img_lg, 'works/lg' , $name, 1920, null, 90);
          $this->resizeImage($img_md, 'works/md' , $name, 1280, null, 90);
          $this->resizeImage($img_sm, 'works/sm' , $name, 1024, null, 90);
        }
        unset($data['files']);
      }
      else {
        $files_array = json_decode($work, true);
        $data['images'] = $files_array['images'];
      }

      $data = $this->makeJson($data);
      $result = $work->update($data);

      return redirect()->route('works.edit',$work);
    }

    /**
     * Remove the specified image from Service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(Work $work, $key, $image)
    {
      $data = json_decode($work, true);

      if ($image) {
        Storage::delete('works/sm/'.$image.'.jpg');
        Storage::delete('works/sm/'.$image.'.webp');
        Storage::delete('works/md/'.$image.'.jpg');
        Storage::delete('works/md/'.$image.'.webp');
        Storage::delete('works/lg/'.$image.'.jpg');
        Storage::delete('works/lg/'.$image.'.webp');
        unset($data['images'][$key]);
      }

      $data = $this->makeJson($data);

      $work->update($data);

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
      Storage::delete('works/sm/'.$work->image.'.jpg');
      Storage::delete('works/sm/'.$work->image.'.webp');
      Storage::delete('works/md/'.$work->image.'.jpg');
      Storage::delete('works/md/'.$work->image.'.webp');
      Storage::delete('works/lg/'.$work->image.'.jpg');
      Storage::delete('works/lg/'.$work->image.'.webp');

      if ($work->images) {
        foreach ($work->images as $key => $image) {
          Storage::delete('works/sm/'.$image.'.jpg');
          Storage::delete('works/sm/'.$image.'.webp');
          Storage::delete('works/md/'.$image.'.jpg');
          Storage::delete('works/md/'.$image.'.webp');
          Storage::delete('works/lg/'.$image.'.jpg');
          Storage::delete('works/lg/'.$image.'.webp');
        }
      }

      $work->delete();

      return redirect()->route('works.index');
    }
}
