<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait TraitController
{

    private $model = null;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        return $this->model = $model;
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->setModel(self::MODEL);
    }

    public function index()
    {
        return $this->successResponse($this->getModel()::all());
    }

    public function show($id)
    {

        if ($data = $this->getModel()::find($id)) {
            return $this->successResponse($data);
        }
        return $this->notFoundResponse();
    }

    public function store(Request $request)
    {

        try {

            $validator = \Validator::make($request->all(), $this->validationRules);

            if ($validator->fails()) {
                throw new \Exception('ValidationException');
            }

            $data = $this->getModel()::create($request->all());
            return $this->storeResponse($data);
        } catch (\Exception $exception) {
            $data = ['errors' => $validator->errors(), 'exception' => $exception->getMessage()];
            return $this->errorResponse($data);
        }
    }

    public function update(Request $request, $id)
    {

        if (!$data = $this->getModel()::find($id)) {
            return $this->notFoundResponse();
        }

        try {

            $validator = \Validator::make($request->all(), $this->validationRules);

            if ($validator->fails()) {
                throw new \Exception("ValidationException");
            }

            $data->fill($request->all());
            $data->save();

            return $this->successResponse($data);
        } catch (\Exception $exception) {
            $data = ['errors' => $validator->errors(), 'exception' => $exception->getMessage()];
            return $this->errorResponse($data);
        }
    }

    public function destroy($id)
    {

        if (!$data = $this->getModel()::find($id)) {
            return $this->notFoundResponse();
        }

        $data->delete();
        return $this->deleteResponse();
    }

    protected function storeResponse($data)
    {

        $response = [
            'code' => 201,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    protected function successResponse($data)
    {

        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    protected function notFoundResponse()
    {

        $response = [
            'code' => 404,
            'status' => 'error',
            'data' => 'Resource Not Found',
            'message' => 'Not Found'
        ];
        return response()->json($response, $response['code']);
    }


    public function deleteResponse()
    {

        $response = [
            'code' => 204,
            'status' => 'success',
            'message' => 'Deleted'
        ];
        return response()->json($response, $response['code']);
    }

    public function errorResponse($data)
    {

        $response = [
            'code' => 422,
            'status' => 'error',
            'data' => $data,
            'message' => 'Unprocessable Entity'
        ];
        return response()->json($response, $response['code']);
    }
}
