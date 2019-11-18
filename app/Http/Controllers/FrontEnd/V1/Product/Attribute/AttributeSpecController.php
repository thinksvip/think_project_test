<?php

namespace App\Http\Controllers\FrontEnd\V1\Product\Attribute;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Attribute\AttributeSpecRequest;
use App\Http\Resources\Product\Attribute\AttributeSpecResource;
use App\Repositories\Product\Attribute\CreateAttributeSpec;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AttributeSpecController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AttributeSpecResource
     */
    public function store(AttributeSpecRequest $request) : AttributeSpecResource
    {
        try{
            $spec = app(CreateAttributeSpec::class)->execute($request->all());
        } catch (ModelNotFoundException $exception) {
            return $this->respondNotFound();
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        } catch (QueryException $exception) {
            return $this->respondInvalidQuery();
        }

        return new AttributeSpecResource($spec);
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
    public function update(Request $request, $id)
    {
        //
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
