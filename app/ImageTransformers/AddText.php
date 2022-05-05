<?php

namespace App\ImageTransformers;

class AddText implements TransformerInterface
{
  public function transform($image)
  {
      $white = imagecolorallocate($image, 255, 255, 255);

        imagettftext(
            $image,
            40,
            0,
            100, 100,
            $white,
            '/app/storage/fonts/Game Of Squids.ttf',
            'A lot of text'
        );

  }
}
