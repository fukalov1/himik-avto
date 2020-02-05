<?php

namespace App\Admin\Extensions\Form\Field;

use Encore\Admin\Form\Field\Image;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;
//use Imagez;
use Intervention\Image\Facades\Image as Imagez;

class MyResizeImage extends Image
{
    use \Encore\Admin\Form\Field\ImageField;

    /**
     * {@inheritdoc}
     */
    protected $view = 'admin::form.file';

    /**
     *  Validation rules.
     *
     * @var string
     */
    protected $rules = 'image';

    /**
     * @param array|UploadedFile $image
     *
     * @return string
     */
    public function prepare($image)
    {
        $width = 350;
        $height = 233;
        $result='';
        if (request()->has(static::FILE_DELETE_FLAG)) {
            return $this->destroy();
        }

        $this->name = $this->getStoreName($image);

        $this->callInterventionMethods($image->getRealPath());

        $filename = $this->uploadAndDeleteOriginal($image);

        $file = public_path('uploads').'/'.$filename;
        $filename = preg_replace('/images\//','', $filename);
        try {
            $i = Imagez::make($file);
            $w = $i->width();
            $h = $i->height();

            if ($w/$h > $width/$height) {
                $i->resize(round($height*$w/$h,0), $height);
            }
            else {
                $i->resize($width, round($width*$h/$w,0));
            }
            Log::warning('test write preview '.public_path('uploads').'/images/thumbnail/'.$filename);
//        $i->crop($width,$height);

            $i->save(public_path('uploads').'/images/thumbnail/'.$filename);
            $i->crop($width,$height);
            Log::info('Write successfully preview '.public_path('uploads').'/images/thumbnail/'.$filename);
        }
        catch (\Exception $exception) {
            Log::warning('Error write preview '.public_path('uploads').'/images/thumbnail/'.$filename." Error: ".$exception->getMessage() );
        }

        $i->save(public_path('uploads').'/images/thumbnail/'.$filename);


        return $filename;
    }

    protected function resizePhoto($img) {
        Image::make($img)
            ->resize(200,200)
            ->save($img);
    }

}
