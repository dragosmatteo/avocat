<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
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
    $sliders = Slider::orderBy('order','asc')->get();

    return view('cpanel.sliders.index',compact('sliders'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('cpanel.sliders.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Slider $slider)
  {
    $request->validate([
        'image' => 'required'
    ]);

    $data = $request->all();

    if ($request->file('image')) {
      $name = (string)\Str::uuid();
      $data['image'] = $name;

      $path_lg = $request->file('image')->storeAs('sliders/lg', $name.'.jpg');
      $path_md = $request->file('image')->storeAs('sliders/md', $name.'.jpg');
      $path_sm = $request->file('image')->storeAs('sliders/sm', $name.'.jpg');

      $img_lg = Image::make('files/'.$path_lg);
      $img_md = Image::make('files/'.$path_md);
      $img_sm = Image::make('files/'.$path_sm);

      $this->resizeImage($img_lg, 'sliders/lg' , $name, 1920, 1080, 90);
      $this->resizeImage($img_md, 'sliders/md' , $name, 1280, 1024, 90);
      $this->resizeImage($img_sm, 'sliders/sm' , $name, 1024, 768, 90);
    }

    $data = $this->makeJson($data);

    $result = $slider->create($data);

    return redirect()->route('sliders.edit',$result);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Slider  $slider
   * @return \Illuminate\Http\Response
   */
  public function show(Slider $slider)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Slider  $slider
   * @return \Illuminate\Http\Response
   */
  public function edit(Slider $slider)
  {
    return view('cpanel.sliders.edit',compact('slider'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Slider  $slider
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Slider $slider)
  {

    if ($request->missing(['title'])) {
      $data = json_decode($slider, true);
      if ($request->order) {
        $data['order'] = $request->order;
      }
      $data = $this->makeJson($data);
      $slider->update($data);
      return back();
    }

    $data = $request->all();

    if ($request->file('image')) {
      $name = (string)\Str::uuid();
      $data['image'] = $name;

      $path_lg = $request->file('image')->storeAs('sliders/lg', $name.'.jpg');
      $path_md = $request->file('image')->storeAs('sliders/md', $name.'.jpg');
      $path_sm = $request->file('image')->storeAs('sliders/sm', $name.'.jpg');

      $img_lg = Image::make('files/'.$path_lg);
      $img_md = Image::make('files/'.$path_md);
      $img_sm = Image::make('files/'.$path_sm);

      $this->resizeImage($img_lg, 'sliders/lg' , $name, 1920, 1080, 90);
      $this->resizeImage($img_md, 'sliders/md' , $name, 1280, 1024, 90);
      $this->resizeImage($img_sm, 'sliders/sm' , $name, 1024, 768, 90);

      Storage::delete('sliders/sm/'.$slider->image.'.jpg');
      Storage::delete('sliders/sm/'.$slider->image.'.webp');
      Storage::delete('sliders/md/'.$slider->image.'.jpg');
      Storage::delete('sliders/md/'.$slider->image.'.webp');
      Storage::delete('sliders/lg/'.$slider->image.'.jpg');
      Storage::delete('sliders/lg/'.$slider->image.'.webp');
    }

    $data = $this->makeJson($data);

    $result = $slider->update($data);

    return redirect()->route('sliders.edit',$slider);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Slider  $slider
   * @return \Illuminate\Http\Response
   */
  public function destroy(Slider $slider)
  {
    Storage::delete('sliders/sm/'.$slider->image.'.jpg');
    Storage::delete('sliders/sm/'.$slider->image.'.webp');
    Storage::delete('sliders/md/'.$slider->image.'.jpg');
    Storage::delete('sliders/md/'.$slider->image.'.webp');
    Storage::delete('sliders/lg/'.$slider->image.'.jpg');
    Storage::delete('sliders/lg/'.$slider->image.'.webp');

    $slider->delete();

    return redirect()->route('sliders.index');
  }
}
