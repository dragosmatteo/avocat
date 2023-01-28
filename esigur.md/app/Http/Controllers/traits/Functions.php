<?php

namespace App\Http\Controllers\traits;

use DB;
use Cookie;
use Cache;

trait Functions
{

  // Счетчик просмотров для блогов и товаров
  public function makeViews($id,$table,$views){

    $user_ip = $_SERVER['REMOTE_ADDR'];
    $cookie_name = $table.'-'.$id;
    $minutes = 1440;
    $check = Cookie::get($cookie_name);

    if ($check == null) {
      DB::table($table)
              ->where('id', $id)
              ->update(['views' => $views + 1]);

      Cookie::queue($cookie_name, $user_ip, $minutes);
    }

  }

}

 ?>
