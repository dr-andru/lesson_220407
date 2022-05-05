<?php

namespace App\ImageTransformers;

class DrawLine implements TransformerInterface
{
  private $rgbcolor = [];
  private $points = [];

  public function __construct($color, $point)
  {
      $this->rgbcolor = $color;
      $this->points = $point;
  }

  public function transform($image)
  {
      $color = imagecolorallocate(
        $image,
        $this->rgbcolor['r'],
        $this->rgbcolor['g'],
        $this->rgbcolor['b']);

      imageline($image,
        $this->points['x1'],
        $this->points['y1'],
        $this->points['x2'],
        $this->points['y2'],
        $color);
  }
}
