<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function imageDraw()
    {
      $image = imagecreatetruecolor(1024, 568);

      $green = imagecolorallocate($image, 50, 255, 50);

      imagefill($image, 1, 1, $green);

      $black = imagecolorallocate($image, 0, 0, 0);

      imageline($image, 0, 568 / 3, 1024, 568 / 3 * 2, $black);

      $white = imagecolorallocate($image, 255, 255, 255);


            imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
            imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);

      imagettftext(
          $image,
          40,
          0,
          100, 100,
          $white,
          '/app/storage/fonts/Game Of Squids.ttf',
          'A lot of text'
      );

      $auto = imagecreatefrompng('/app/storage/auto.png');

      $autoX = imagesx ($auto);
      $autoY = imagesy ($auto);

      imagecopyresized(
        $image,
        $auto,
        1024 / 2, 568 / 2,
        0, 0,
        1024 / 2, 568 / 2,
        $autoX,
        $autoY
      );
      //imagepng($image, '/app/storage/test.png');

      ob_start();

      imagepng($image);

      $imageContent = ob_get_contents();

      ob_end_clean();

      return response($imageContent)
        ->header('Content-Type', 'image/png');
    }
}
