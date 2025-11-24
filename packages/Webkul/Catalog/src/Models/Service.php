<?php

namespace Webkul\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{   
     use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'image',
        'subservices_id',
        'status'
    ];

    public $timestamps = true;
    public function subservice()
    {
        return $this->belongsTo(Subservice::class, 'subservices_id');
    }

}
