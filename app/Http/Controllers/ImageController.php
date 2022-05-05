<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\ImageTransformers\ImageFill;
use App\ImageTransformers\DrawLine;
use App\ImageTransformers\AddBlur;
use App\ImageTransformers\AddText;
use App\ImageTransformers\AddImage;
use App\ImageTransformers\TransformerInterface;

class ImageController extends Controller
{
    /**
    * @var TransformerInterface[]
    */
    private $mutateList = [];

    public function __construct()
    {
      $this->mutateList = [
        new ImageFill(),
        new DrawLine([
          'r' => 0,
          'g' => 0,
          'b' => 0,
        ],
          [
            'x1' => 0,
            'y1' => 568 / 3,
            'x2' => 1024,
            'y2' => 568 / 3 * 2
          ]
      ),
        new AddBlur(),
        new AddBlur(),
        new AddBlur(),
        new AddBlur(),
        new AddBlur(),
        new DrawLine([
          'r' => 0,
          'g' => 255,
          'b' => 0,
        ],
          [
            'x1' => 0,
            'y1' => 100,
            'x2' => 1024,
            'y2' => 100
          ]
      ),
        new AddText(),
        new AddImage(),
      ];
    }

    public function imageDraw()
    {
      $user=User::find(1);
      dd($user->role->users);
      $image = $this->createImage(1024, 568);

      foreach ($this->mutateList as $value) {
        $value->transform($image);
      }

      $imageContent = $this->getImageContent($image);

      return $this->getResponse($imageContent);
    }

    private function createImage($width, $height)
    {
      return imagecreatetruecolor($width, $height);
    }

    private function getImageContent($image)
    {
      ob_start();

      imagepng($image);

      $imageContent = ob_get_contents();

      ob_end_clean();

      return $imageContent;
    }

    private function getResponse($imageContent)
    {
      return response($imageContent)
        ->header('Content-Type', 'image/png');
    }
}
