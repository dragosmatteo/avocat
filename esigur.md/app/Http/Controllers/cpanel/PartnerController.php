<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class PartnerController extends Controller
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
      $partners = partner::orderBy('order','asc')->get();

      return view('cpanel.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Partner $partner)
    {
      $request->validate([
          'image' => 'required'
      ]);

      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('partners/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('partners/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('partners/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'partners/lg' , $name, 1100, 1000, 90);
        $this->resizeImage($img_md, 'partners/md' , $name, 825, 750, 90);
        $this->resizeImage($img_sm, 'partners/sm' , $name, 550, 500, 90);

      }

      $data = $this->makeJson($data);

      $result = $partner->create($data);

      return redirect()->route('partners.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
      return view('cpanel.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
      if ($request->missing(['name','title'])) {
        $data = json_decode($partner, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $partner->update($data);
        return back();
      }

      $data = $request->all();

      if ($request->file('image')) {
        $name = (string)\Str::uuid();
        $data['image'] = $name;

        $path_lg = $request->file('image')->storeAs('partners/lg', $name.'.jpg');
        $path_md = $request->file('image')->storeAs('partners/md', $name.'.jpg');
        $path_sm = $request->file('image')->storeAs('partners/sm', $name.'.jpg');

        $img_lg = Image::make('files/'.$path_lg);
        $img_md = Image::make('files/'.$path_md);
        $img_sm = Image::make('files/'.$path_sm);

        $this->resizeImage($img_lg, 'partners/lg' , $name, 1100, 1000, 90);
        $this->resizeImage($img_md, 'partners/md' , $name, 825, 750, 90);
        $this->resizeImage($img_sm, 'partners/sm' , $name, 550, 500, 90);

        Storage::delete('partners/sm/'.$partner->image.'.jpg');
        Storage::delete('partners/sm/'.$partner->image.'.webp');
        Storage::delete('partners/md/'.$partner->image.'.jpg');
        Storage::delete('partners/md/'.$partner->image.'.webp');
        Storage::delete('partners/lg/'.$partner->image.'.jpg');
        Storage::delete('partners/lg/'.$partner->image.'.webp');
      }

      $data = $this->makeJson($data);

      $result = $partner->update($data);

      return redirect()->route('partners.edit',$partner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
      Storage::delete('partners/sm/'.$partner->image.'.jpg');
      Storage::delete('partners/sm/'.$partner->image.'.webp');
      Storage::delete('partners/md/'.$partner->image.'.jpg');
      Storage::delete('partners/md/'.$partner->image.'.webp');
      Storage::delete('partners/lg/'.$partner->image.'.jpg');
      Storage::delete('partners/lg/'.$partner->image.'.webp');

      $partner->delete();

      return redirect()->route('partners.index');
    }
}
