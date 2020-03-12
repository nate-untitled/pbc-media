<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ImageGallery extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);

        $this->addMediaConversion('medium')
            ->width(500)
            ->height(500);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('my_multi_collection');
    }
}
