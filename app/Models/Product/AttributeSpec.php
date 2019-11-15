<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class AttributeSpec extends Model
{
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(AttributeSpec::class);
    }
}
