<?php

namespace App\ImageTransformers;

class AddImage implements TransformerInterface
{
  public function transform($image)
  {

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
  }
}
