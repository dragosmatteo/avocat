<?php

namespace App\Http\Controllers\cpanel\traits;

trait ImageFunctions
{

  public function resizeImage($img, $path, $name, $width, $height, $quality, $type = null)
  {

    if ($width != null) {
      $img->resize($width, null, function ($constraint) {
          $constraint->aspectRatio();
      });
    }

    if ($height != null) {
      if ($img->height() < $height) {
        $img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
      }
    }

    if ($width != null and $height != null) {
      $img->crop($width,$height);
    }

    if ($path != null and $name != null) {
      if ($type != null) {
        $img->save('files/'.$path.'/'.$name.'.png', $quality, 'png');
      }
      else{
        $img->save('files/'.$path.'/'.$name.'.jpg', $quality, 'jpeg');
        $img->save('files/'.$path.'/'.$name.'.webp', $quality, 'webp');
      }

    }
    else{
      $img->save(null, $quality);
    }

  }

}

 ?>
