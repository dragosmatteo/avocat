<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{

    use traits\TranslateFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $parts = part::orderBy('order','asc')->get();

      return view('cpanel.parts.index',compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Part $part)
    {
      $data = $request->all();

      $data = $this->makeJson($data);

      $result = $part->create($data);

      return redirect()->route('parts.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
      return view('cpanel.parts.edit',compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
      if ($request->missing(['name','body'])) {
        $data = json_decode($part, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $part->update($data);
        return back();
      }

      $data = $request->all();

      $data = $this->makeJson($data);

      $result = $part->update($data);

      return redirect()->route('parts.edit',$part);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
      $part->services()->detach();

      $part->delete();

      return redirect()->route('parts.index');
    }
}
