<?php

namespace App\Http\Controllers\FrontEnd\V1\Product\Attribute;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\Attribute\AttributeRequest;
use App\Http\Resources\Product\Attribute\AttributeResource;
use App\Repositories\Product\Attribute\CreateAttribute;
use App\Repositories\Product\Attribute\UpdateAttribute;
use App\Services\Product\Attribute\AttributeService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AttributeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $attribute;

    public function __construct(AttributeService $attribute)
    {
        $this->attribute = $attribute;
    }

    public function index()
    {
        $attribute = $this->attribute->all();
        return AttributeResource::collection($attribute);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        try{
            $attribute = app(CreateAttribute::class)->execute(
                $request->except(['enterprise_id'])
                +
                [
                    //TODO 企业模块完成后替换
                    'enterprise_id' => '5',
                ]
            );
        } catch (ModelNotFoundException $exception) {
            return $this->respondNotFound();
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        } catch (QueryException $exception) {
            return $this->respondInvalidQuery();
        }

        return new AttributeResource($attribute);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
//        try{
            $attribute = app(AttributeService::class)->update(
                $request->except(['enterprise_id'])
                +
                [
                    'attribute_id' => $id,
                    //TODO 企业模块完成后替换
                    'enterprise_id' => '5',
                ]
            );
//        } catch (ModelNotFoundException $exception) {
//            return $this->respondNotFound();
//        } catch (ValidationException $exception) {
//            return $this->respondValidatorFailed($exception->validator);
//        } catch (QueryException $exception) {
//            return $this->respondInvalidQuery();
//        }

        return new AttributeResource($attribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
