<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{

    use traits\TranslateFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $advantages = advantage::orderBy('order','asc')->get();

      return view('cpanel.advantages.index',compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.advantages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advantage $advantage)
    {
      $data = $request->all();

      $data = $this->makeJson($data);

      $result = $advantage->create($data);

      return redirect()->route('advantages.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
      return view('cpanel.advantages.edit',compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advantage $advantage)
    {
      if ($request->missing(['name','body'])) {
        $data = json_decode($advantage, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $advantage->update($data);
        return back();
      }

      $data = $request->all();

      $data = $this->makeJson($data);

      $result = $advantage->update($data);

      return redirect()->route('advantages.edit',$advantage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
      $advantage->services()->detach();

      $advantage->delete();

      return redirect()->route('advantages.index');
    }
}
