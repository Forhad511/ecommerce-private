<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OthersImage extends Model
{
    use HasFactory;
    private static $othersImage,$othersImages, $image, $imageName, $directory,$imageUrl,$imageExtension;

    public static function getImageUrl($image)
    {
        self::$imageExtension    = $image->getClientOriginalExtension();
        self::$imageName         = rand(1,50000).'.'.self::$imageExtension;
        self::$directory         = 'upload/product-others/image/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl          = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newOthersImage($images,$id)
    {
        foreach ($images as $image  )
        {
            self::$othersImage                          =new OthersImage();
            self::$othersImage->product_id              = $id;
            self::$othersImage->feature_image           = self::getImageUrl($image);
            self::$othersImage->save();
        }
    }

    public static function updateOthersImage($images,$id)
    {
        self::deleteOthersImage($id);
        self::newOthersImage($images,$id);
    }

    public static function deleteOthersImage($id)
    {
        self::$othersImages = OthersImage::where('product_id',$id)->get();
        foreach (self::$othersImages as $image  )
        {
            if (file_exists($image->feature_image))
            {
                unlink($image->feature_image);
            }
            $image->delete();
        }
    }
}
