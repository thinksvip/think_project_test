<?php

namespace App\Services\Product\Attribute;

use App\Models\Product\Attribute;

class AttributeService
{

    protected $model;

    public function __construct(Attribute $attribute)
    {
        $this->model = $attribute;
    }

    public function all()
    {
        return $this->model->all();
    }
    //

}
