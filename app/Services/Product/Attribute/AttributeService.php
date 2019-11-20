<?php

namespace App\Services\Product\Attribute;

use App\Models\Product\Attribute;
use Yish\Generators\Foundation\Service\Service;

class AttributeService extends Service
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
