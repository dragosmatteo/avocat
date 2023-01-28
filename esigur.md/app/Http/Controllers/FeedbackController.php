<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CallRequest;
use App\Newsletter;

class FeedbackController extends Controller
{

    public function call(Request $request)
    {
      $request->validate([
          'name' => 'required|min:3|max:35',
          'phone' => 'required|min:6|max:35'
      ]);

      $array = $request->all();

      \Mail::to('esigurmd@gmail.com')->send(new CallRequest($array));

      return view('feedback.index');
    }

    public function show()
    {
      return view('feedback.index');
    }

}
