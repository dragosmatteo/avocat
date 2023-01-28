<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Step;
use App\Models\Faq;
use App\Models\Part;
use App\Models\Advantage;
use App\Models\Work;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
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
      $services = Service::orderBy('order','asc')->get();

      return view('cpanel.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $services = Service::all();

      return view('cpanel.services.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
      $request->validate([
          'image' => 'required',
          'icon' => 'required',
          'slug' => 'required|unique:services'
      ]);

      $data = $request->all();

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('services/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('services/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('services/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'services/lg' , $name, 1600, 1600, 90);
        $this->resizeImage($img_md, 'services/md' , $name, 1200, 1200, 90);
        $this->resizeImage($img_sm, 'services/sm' , $name, 800, 800, 90);
      }

      if ($request->file('icon')) {
        $name = (string)\Str::uuid();
        $data['icon'] = $name;

        $path_lg = $request->file('icon')->storeAs('services/lg', $name.'.png');
        $path_md = $request->file('icon')->storeAs('services/md', $name.'.png');
        $path_sm = $request->file('icon')->storeAs('services/sm', $name.'.png');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'services/lg' , $name, 100, 100, 90, 'png');
        $this->resizeImage($img_md, 'services/md' , $name, 75, 75, 90, 'png');
        $this->resizeImage($img_sm, 'services/sm' , $name, 50, 50, 90, 'png');
      }

      $data = $this->makeJson($data);

      $result = $service->create($data);

      return redirect()->route('services.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
      $steps = Step::all();
      $faqs = Faq::all();
      $advantages = Advantage::all();
      $parts = Part::all();
      $prices = Price::all();
      $works = Work::all();

      return view('cpanel.services.edit',compact('service','steps','faqs','advantages','parts','prices','works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
      if ($request->missing(['title','body'])) {
        $data = json_decode($service, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        if ($request->on_main == 1) {
          $data['on_main'] = $request->on_main;
        }
        else{
          $data['on_main'] = 0;
        }
        $data = $this->makeJson($data);
        $service->update($data);
        return back();
      }

      $request->validate([
        'slug' => [
            'required',
            Rule::unique('services')->ignore($service->id),
        ]
      ]);

      $data = $request->all();

      $service->steps()->detach();
      $service->works()->detach();
      $service->faqs()->detach();
      $service->parts()->detach();
      $service->prices()->detach();
      $service->advantages()->detach();

      if (isset($data['steps'])) {
        foreach ($data['steps'] as $step_id) {
          $service->steps()->attach($step_id);
        }
        unset($data['steps']);
      }

      if (isset($data['works'])) {
        foreach ($data['works'] as $work_id) {
          $service->works()->attach($work_id);
        }
        unset($data['works']);
      }

      if (isset($data['faqs'])) {
        foreach ($data['faqs'] as $faq_id) {
          $service->faqs()->attach($faq_id);
        }
        unset($data['faqs']);
      }

      if (isset($data['parts'])) {
        foreach ($data['parts'] as $part_id) {
          $service->parts()->attach($part_id);
        }
        unset($data['parts']);
      }

      if (isset($data['prices'])) {
        foreach ($data['prices'] as $price_id) {
          $service->prices()->attach($price_id);
        }
        unset($data['prices']);
      }

      if (isset($data['advantages'])) {
        foreach ($data['advantages'] as $advantage_id) {
          $service->advantages()->attach($advantage_id);
        }
        unset($data['advantages']);
      }

      $data['slug'] = strtolower(str_ireplace([" ", "_", "/", ".", ",", "!", "?", "&", "'"], "-", $data['slug']));

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('services/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('services/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('services/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'services/lg' , $name, 1600, 1600, 90);
        $this->resizeImage($img_md, 'services/md' , $name, 1200, 1200, 90);
        $this->resizeImage($img_sm, 'services/sm' , $name, 800, 800, 90);

        Storage::delete('services/sm/'.$service->image.'.jpg');
        Storage::delete('services/sm/'.$service->image.'.webp');
        Storage::delete('services/md/'.$service->image.'.jpg');
        Storage::delete('services/md/'.$service->image.'.webp');
        Storage::delete('services/lg/'.$service->image.'.jpg');
        Storage::delete('services/lg/'.$service->image.'.webp');
      }

      if ($request->file('icon')) {
        $name = (string)\Str::uuid();
        $data['icon'] = $name;

        $path_lg = $request->file('icon')->storeAs('services/lg', $name.'.png');
        $path_md = $request->file('icon')->storeAs('services/md', $name.'.png');
        $path_sm = $request->file('icon')->storeAs('services/sm', $name.'.png');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'services/lg' , $name, 100, 100, 90, 'png');
        $this->resizeImage($img_md, 'services/md' , $name, 75, 75, 90, 'png');
        $this->resizeImage($img_sm, 'services/sm' , $name, 50, 50, 90, 'png');

        Storage::delete('services/sm/'.$service->icon.'.jpg');
        Storage::delete('services/sm/'.$service->icon.'.webp');
        Storage::delete('services/md/'.$service->icon.'.jpg');
        Storage::delete('services/md/'.$service->icon.'.webp');
        Storage::delete('services/lg/'.$service->icon.'.jpg');
        Storage::delete('services/lg/'.$service->icon.'.webp');
      }

      $data = $this->makeJson($data);

      $result = $service->update($data);

      return redirect()->route('services.edit',$service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
      Storage::delete('services/sm/'.$service->image.'.jpg');
      Storage::delete('services/sm/'.$service->image.'.webp');
      Storage::delete('services/md/'.$service->image.'.jpg');
      Storage::delete('services/md/'.$service->image.'.webp');
      Storage::delete('services/lg/'.$service->image.'.jpg');
      Storage::delete('services/lg/'.$service->image.'.webp');

      $service->steps()->detach();
      $service->works()->detach();
      $service->faqs()->detach();
      $service->parts()->detach();
      $service->prices()->detach();
      $service->advantages()->detach();

      $service->delete();

      return redirect()->route('services.index');
    }
}
