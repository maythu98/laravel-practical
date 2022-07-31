<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mail\FormSubmittedMail;
use App\Models\PublicForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PublicFormController extends Controller
{
    /**
     * Public Form Upload store
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'form_id' => 'required',
            'data' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 422);
        }

        //Form Create
        $public_form = PublicForm::create([
            'form_id' => request('form_id'),
            'user_id' => auth()->id(),
            'data' => json_encode(request('data'))
        ]);

        //Sending Mail 
        Mail::to(auth()->user())
            ->send(
                new FormSubmittedMail($public_form->load('user', 'name'))
            );

    }
}
