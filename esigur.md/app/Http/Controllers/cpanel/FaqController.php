<?php

namespace App\Http\Controllers\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    use traits\TranslateFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $faqs = Faq::orderBy('order','asc')->get();

      return view('cpanel.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cpanel.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $faq)
    {
      $data = $request->all();

      $data = $this->makeJson($data);

      $result = $faq->create($data);

      return redirect()->route('faqs.edit',$result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
      $services = Service::all();

      return view('cpanel.faqs.edit',compact('faq', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
      if ($request->missing(['name','body'])) {
        $data = json_decode($faq, true);
        if ($request->order) {
          $data['order'] = $request->order;
        }
        $data = $this->makeJson($data);
        $faq->update($data);
        return back();
      }

      $faq->services()->detach();

      $data = $request->all();

      if (isset($data['services'])) {
        foreach ($data['services'] as $service_id) {
          $faq->services()->attach($service_id);
        }
        unset($data['services']);
      }

      $data = $this->makeJson($data);

      $result = $faq->update($data);

      return redirect()->route('faqs.edit',$faq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
      $faq->services()->detach();

      $faq->delete();

      return redirect()->route('faqs.index');
    }
}
