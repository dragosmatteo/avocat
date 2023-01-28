<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$file)
    {
      $data = $request->all();
      unset($data['_token']);

      $file = '../config/'.$file.'/'.$file.'.php';
      file_put_contents($file, '<?php return '.var_export($data,true).';');

      return back();
    }

}
