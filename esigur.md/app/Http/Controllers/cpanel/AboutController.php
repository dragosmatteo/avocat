<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Validation\Rule;

class AboutController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, About $about)
    {
      $request->validate([
          'image' => 'required',
          'logo' => 'required',
          'favicon' => 'required',
          'company' => 'required',
      ]);

      $data = $request->all();

      if ($request->file('logo')) {
        $name = (string)\Str::uuid();
        $data['logo'] = $name;

        $path_lg = $request->file('logo')->storeAs('abouts/lg', $name.'.jpg');
        $path_md = $request->file('logo')->storeAs('abouts/md', $name.'.jpg');
        $path_sm = $request->file('logo')->storeAs('abouts/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'abouts/lg' , $name, 200, null, 90);
        $this->resizeImage($img_md, 'abouts/md' , $name, 120, null, 90);
        $this->resizeImage($img_sm, 'abouts/sm' , $name, 80, null, 90);
      }

      if ($request->file('favicon')) {
        $path = $request->file('favicon')->store('abouts');
        $data['favicon'] = $path;
        // $img = Image::make('files/'.$path);
        // $img = $this->resizeImage($img, null, null, 25, 25, 70);
      }

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('abouts/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('abouts/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('abouts/sm', $name.'.jpg');
        $path_jpg_thumb = $request->file('image')->storeAs('abouts/thumbs', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);
        $img_thumb = Image::make('files/'.$path_jpg_thumb);

        $this->resizeImage($img_lg, 'abouts/lg' , $name, 1920, 800, 75);
        $this->resizeImage($img_md, 'abouts/md' , $name, 1440, 600, 75);
        $this->resizeImage($img_sm, 'abouts/sm' , $name, 1280, 500, 75);
        $this->resizeImage($img_thumb, 'abouts/thumbs' , $name, 700, 700, 75);
      }

      if ($request->file('files')) {
        foreach ($request->file('files') as $key => $image) {
          $name = (string)\Str::uuid();
          $data['images'][] = $name;

          $path_lg = $image->storeAs('abouts/lg', $name.'.jpg');
          $path_md = $image->storeAs('abouts/md', $name.'.jpg');
          $path_sm = $image->storeAs('abouts/sm', $name.'.jpg');

          $img_lg = Image::make('files/'.$path_lg);
          $img_md = Image::make('files/'.$path_md);
          $img_sm = Image::make('files/'.$path_sm);

          $this->resizeImage($img_lg, 'abouts/lg' , $name, 750, 750, 80);
          $this->resizeImage($img_md, 'abouts/md' , $name, 500, 500, 80);
          $this->resizeImage($img_sm, 'abouts/sm' , $name, 250, 250, 80);
        }
        unset($data['files']);
      }

      $data = $this->makeJson($data);

      $result = $about->create($data);

      return redirect()->route('abouts.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
      return view('cpanel.abouts.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
      $request->validate([
          'company' => 'required'
      ]);

      $data = $request->all();

      if ($request->file('logo')) {
        $name = (string)\Str::uuid();
        $data['logo'] = $name;

        $path_lg = $request->file('logo')->storeAs('abouts/lg', $name.'.jpg');
        $path_md = $request->file('logo')->storeAs('abouts/md', $name.'.jpg');
        $path_sm = $request->file('logo')->storeAs('abouts/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'abouts/lg' , $name, 200, null, 90);
        $this->resizeImage($img_md, 'abouts/md' , $name, 120, null, 90);
        $this->resizeImage($img_sm, 'abouts/sm' , $name, 80, null, 90);

        Storage::delete('abouts/sm/'.$about->logo.'.jpg');
        Storage::delete('abouts/sm/'.$about->logo.'.webp');
        Storage::delete('abouts/md/'.$about->logo.'.jpg');
        Storage::delete('abouts/md/'.$about->logo.'.webp');
        Storage::delete('abouts/lg/'.$about->logo.'.jpg');
        Storage::delete('abouts/lg/'.$about->logo.'.webp');
      }

      if ($request->file('favicon')) {
        $path = $request->file('favicon')->store('abouts');
        $data['favicon'] = $path;
        // $img = Image::make('files/'.$path);
        // $img = $this->resizeImage($img, null, null, 25, 25, 70);
        Storage::delete($about->favicon);
      }

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('abouts/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('abouts/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('abouts/sm', $name.'.jpg');
        $path_jpg_thumb = $request->file('image')->storeAs('abouts/thumbs', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);
        $img_thumb = Image::make('files/'.$path_jpg_thumb);

        $this->resizeImage($img_lg, 'abouts/lg' , $name, 1920, 800, 75);
        $this->resizeImage($img_md, 'abouts/md' , $name, 1440, 600, 75);
        $this->resizeImage($img_sm, 'abouts/sm' , $name, 1280, 500, 75);
        $this->resizeImage($img_thumb, 'abouts/thumbs' , $name, 700, 700, 75);

        Storage::delete('abouts/sm/'.$about->image.'.jpg');
        Storage::delete('abouts/sm/'.$about->image.'.webp');
        Storage::delete('abouts/md/'.$about->image.'.jpg');
        Storage::delete('abouts/md/'.$about->image.'.webp');
        Storage::delete('abouts/lg/'.$about->image.'.jpg');
        Storage::delete('abouts/lg/'.$about->image.'.webp');
        Storage::delete('abouts/thumbs/'.$about->image.'.jpg');
        Storage::delete('abouts/thumbs/'.$about->image.'.webp');
      }

      if ($request->file('image_1')) {
        $name = (string)\Str::uuid();
        $data['image_1'] = $name;

        $path_lg = $request->file('image_1')->storeAs('abouts/lg', $name.'.jpg');
        $path_md = $request->file('image_1')->storeAs('abouts/md', $name.'.jpg');
        $path_sm = $request->file('image_1')->storeAs('abouts/sm', $name.'.jpg');
        $path_jpg_thumb = $request->file('image_1')->storeAs('abouts/thumbs', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);
        $img_thumb = Image::make('files/'.$path_jpg_thumb);

        $this->resizeImage($img_lg, 'abouts/lg' , $name, 1920, 800, 75);
        $this->resizeImage($img_md, 'abouts/md' , $name, 1440, 600, 75);
        $this->resizeImage($img_sm, 'abouts/sm' , $name, 1280, 500, 75);
        $this->resizeImage($img_thumb, 'abouts/thumbs' , $name, 700, 700, 75);

        Storage::delete('abouts/sm/'.$about->image_1.'.jpg');
        Storage::delete('abouts/sm/'.$about->image_1.'.webp');
        Storage::delete('abouts/md/'.$about->image_1.'.jpg');
        Storage::delete('abouts/md/'.$about->image_1.'.webp');
        Storage::delete('abouts/lg/'.$about->image_1.'.jpg');
        Storage::delete('abouts/lg/'.$about->image_1.'.webp');
        Storage::delete('abouts/thumbs/'.$about->image_1.'.jpg');
        Storage::delete('abouts/thumbs/'.$about->image_1.'.webp');
      }

      if ($request->file('files')) {
        $files_array = json_decode($about, true);
        $data['images'] = $files_array['images'];

        foreach ($request->file('files') as $key => $image) {
          $name = (string)\Str::uuid();
          $data['images'][] = $name;

          $path_lg = $image->storeAs('abouts/lg', $name.'.jpg');
          $path_md = $image->storeAs('abouts/md', $name.'.jpg');
          $path_sm = $image->storeAs('abouts/sm', $name.'.jpg');

          $img_lg = Image::make('files/'.$path_lg);
          $img_md = Image::make('files/'.$path_md);
          $img_sm = Image::make('files/'.$path_sm);

          $this->resizeImage($img_lg, 'abouts/lg' , $name, 750, 750, 80);
          $this->resizeImage($img_md, 'abouts/md' , $name, 500, 500, 80);
          $this->resizeImage($img_sm, 'abouts/sm' , $name, 250, 250, 80);
        }
        unset($data['files']);
      }
      else {
        $files_array = json_decode($about, true);
        $data['images'] = $files_array['images'];
      }

      $data = $this->makeJson($data);

      $result = $about->update($data);

      return redirect()->route('abouts.edit',$about);
    }


    /**
     * Remove the specified image from Service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(about $about, $key, $image)
    {
      $data = json_decode($about, true);

      if ($image) {
        Storage::delete('abouts/sm/'.$image.'.jpg');
        Storage::delete('abouts/sm/'.$image.'.webp');
        Storage::delete('abouts/md/'.$image.'.jpg');
        Storage::delete('abouts/md/'.$image.'.webp');
        Storage::delete('abouts/lg/'.$image.'.jpg');
        Storage::delete('abouts/lg/'.$image.'.webp');
        unset($data['images'][$key]);
      }

      $data = $this->makeJson($data);

      $about->update($data);

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
