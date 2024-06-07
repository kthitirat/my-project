<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Professor  extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public const MEDIA_COLLECTION_IMAGE = 'image';


    protected $fillable = ['department_id','major','prefix','first_name','last_name'];


    //รูปภาพอาจารย์
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COLLECTION_IMAGE)->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('optimized')
                    ->fit(Manipulations::FIT_MAX, 600, 600)
                    ->optimize()
                    ->keepOriginalImageFormat();
            });

        $this->addMediaCollection(self::MEDIA_COLLECTION_IMAGE);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    //professor ก็สอนหลาย subject เหมือนกัน
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

}
