<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    protected $with = ['specs'];

    public function spec()
    {
        return $this->hasOne(AttributeSpec::class, 'attribute_id');
    }

    public function specs()
    {
        return $this->hasMany(AttributeSpec::class, 'attribute_id');
    }
}
