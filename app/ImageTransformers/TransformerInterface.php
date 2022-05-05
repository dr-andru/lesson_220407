<?php

namespace App\ImageTransformers;

interface TransformerInterface
{
  public function transform($image);
}
