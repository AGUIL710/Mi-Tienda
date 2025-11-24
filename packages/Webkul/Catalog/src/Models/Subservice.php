<?php

namespace Webkul\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subservice extends Model
{   

    use HasFactory;

    protected $table = 'subservices';

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];

    public $timestamps = true;
     public function services()
    {
        return $this->hasMany(Service::class);
    }       
}
