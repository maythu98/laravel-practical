<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DynamicFormResource;
use App\Models\DynamicForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DynamicFormController extends Controller
{
    /**
     * Get Dynamic Form Latest 
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $item = DynamicForm::where('user_id', auth()->id)->latest()->first();

        return new DynamicFormResource($item);
    }

    /**
     * Dynamic Form Upload store
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'data' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 422);
        }

        $data = $validator->validated();
        $data['user_id'] = auth()->id();
        $data['data'] = json_encode($data['data']);
        
        $form = DynamicForm::create($data);

        return new DynamicFormResource($form);
    }
}
