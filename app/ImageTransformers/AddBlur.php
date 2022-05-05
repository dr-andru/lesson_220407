<?php

namespace App\ImageTransformers;

class AddBlur implements TransformerInterface
{
  public function transform($image)
  {
      imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
  }
}
