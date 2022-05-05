<?php

namespace App\ImageTransformers;

class ImageFill implements TransformerInterface
{
  public function transform($image)
  {
      $green = imagecolorallocate($image, 255, 50, 50);

      imagefill($image, 1, 1, $green);
  }
}
