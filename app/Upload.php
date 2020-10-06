<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.10.2020
 * Time: 11:57
 */
class Upload
{
    private $path = '/upload/';

    public function __construct()
    {
    }

    public function add($data, $size = [], $imagecrop = false){
        $images = getimagesize($data['tmp_name']);
        $images_type = explode('/', $images['mime'])[1];
        $url = $this->path . md5(time().rand()) . '.' . $images_type;
        $path = $_SERVER['DOCUMENT_ROOT'] . $url;
        move_uploaded_file($data['tmp_name'], $path);
        if(count($size) != 0){
            $width_images = $images[0];
            $height_images = $images[1];
            switch ($images['mime']){
                case 'image/png':
                    $image_id = imagecreatefrompng($path);
                    break;
                case 'image/jpeg':
                    $image_id = imagecreatefromjpeg($path);
                    break;
                default:
                    return false;
            }
            $width_size = $size[0];
            $height_size = $size[1];
            if(count($size) == 0){
                $width_size = $images[0];
                $height_size = $images[1];
            }

            if($imagecrop){
                $imagecrop_x = 0;
                $imagecrop_y = 0;
                if($width_images > $height_images){
                    $imagecrop_x = ($width_images - $height_images) / 2;
                    $width_images = $height_images;
                } else {
                    $imagecrop_y = ($height_images - $width_images) / 2;
                    $height_images = $width_images;
                }
                $image_id = imagecrop($image_id, ['x' => $imagecrop_x, 'y' => $imagecrop_y, 'width' => $width_images, 'height' => $height_images]);
                $image_color = imagecreatetruecolor($width_size, $height_size);
                imagecopyresampled($image_color, $image_id, 0, 0, 0, 0, $width_size, $height_size, $width_images, $height_images);
            } else {
                if($width_images > $height_images){
                    $height_new = ceil($height_images/($width_images/$width_size));
                    $image_color = imagecreatetruecolor($width_size, $height_new);
                    imagecopyresampled($image_color, $image_id, 0, 0, 0, 0, $width_size, $height_new, $width_images, $height_images);
                } else {
                    $width_new = ceil($width_images/($height_images/$height_size));
                    $image_color = imagecreatetruecolor($width_new, $height_size);
                    imagecopyresampled($image_color, $image_id, 0, 0, 0, 0, $width_new, $height_size, $width_images, $height_images);
                }
            }

            switch (true){
                case ($images_type == 'png'):
                    imagepng($image_color, $path);
                    break;
                case (in_array($images_type, ['jpeg', 'jpg'])):
                    imagejpeg($image_color, $path);
                    break;
            }
        }
        return $url;
    }
}