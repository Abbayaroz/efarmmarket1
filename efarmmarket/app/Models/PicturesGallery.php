<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/3/2018
 * Time: 6:00 AM
 */

namespace EfarmMarket\Models;


use Illuminate\Database\Eloquent\Model;

class PicturesGallery extends Model
{
    protected $table = "gallery_pictures";
    protected $fillable = ['gallery_id', 'pictures'
    ];
    protected $hidden = [

    ];

    public function imagesProperty()
    {
        $this->belongsTo(gallery::class, 'gallery_id', 'id');
    }
}
