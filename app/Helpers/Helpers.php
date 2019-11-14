<?php

if (!function_exists('is_create')) {

    /**
     * 是否为创建
     *
     * @return bool
     */
    function is_create()
    {
        return request()->isMethod('post');
    }
}

if (!function_exists('is_update')) {

    /**
     * 是否为创建
     *
     * @return bool
     */
    function is_update()
    {
        return request()->isMethod('put');
    }
}