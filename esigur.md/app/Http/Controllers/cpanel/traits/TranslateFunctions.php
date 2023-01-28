<?php

namespace App\Http\Controllers\cpanel\traits;

trait TranslateFunctions
{

  public function makeJson($request){
    foreach ($request as $key => $value) {
      if (is_array($value)) {
        $array[$key] = json_encode($value);
      }
      else{
        $array[$key] = $value;
      }
    }
    return $array;
  }

}

 ?>
