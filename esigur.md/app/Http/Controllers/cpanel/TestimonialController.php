<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class TestimonialController extends Controller
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
      $testimonials = Testimonial::orderBy('order','asc')->get();

      return view('cpanel.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Testimonial $testimonial)
    {
      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();

        $path_jpg = $request->file('image')->storeAs('testimonials', $name.'.jpg');

        $data['image'] = $name;

        $img = Image::make('files/'.$path_jpg);
        $img = $this->resizeImage($img, 'testimonials' , $name, 50, 50, 70);

      }

      $data = $this->makeJson($data);

      $result = $testimonial->create($data);

      return redirect()->route('testimonials.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
      return view('cpanel.testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
      if ($request->missing(['name','body'])) {
        $data = json_decode($testimonial, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $testimonial->update($data);
        return back();
      }

      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();

        $path_jpg = $request->file('image')->storeAs('testimonials', $name.'.jpg');

        $data['image'] = $name;

        $img = Image::make('files/'.$path_jpg);
        $img = $this->resizeImage($img, 'testimonials' , $name, 50, 50, 70);

        Storage::delete('testimonials/'.$testimonial->image.'.jpg');
        Storage::delete('testimonials/'.$testimonial->image.'.webp');
      }

      $data = $this->makeJson($data);

      $result = $testimonial->update($data);

      return redirect()->route('testimonials.edit',$testimonial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
      Storage::delete('testimonials/'.$testimonial->image.'.jpg');
      Storage::delete('testimonials/'.$testimonial->image.'.webp');

      $testimonial->delete();

      return redirect()->route('testimonials.index');
    }
}
