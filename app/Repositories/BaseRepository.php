<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

abstract class BaseRepository
{
    /**
     * Get the validation rules that apply to the Repository.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Validate all datas to execute the Repository.
     *
     * @param array $data
     * @return bool
     */
    public function validate(array $data) : bool
    {
        Validator::make($data, $this->rules())
            ->validate();

        return true;
    }

    /**
     * Checks if the value is empty or null.
     *
     * @param mixed $data
     * @param mixed $index
     * @return mixed
     */
    protected function nullOrValue($data, $index)
    {
        $value = Arr::get($data, $index, null);

        return is_null($value) || $value === '' ? '' : $value;
    }

    /**
     * Checks if the value is empty or null and returns a date from a string.
     *
     * @param mixed $data
     * @param mixed $index
     * @return mixed
     */
    protected function nullOrDate($data, $index)
    {
        $value = Arr::get($data, $index, null);

        return is_null($value) || $value === '' ? '' : Carbon::parse($value);
    }
}
