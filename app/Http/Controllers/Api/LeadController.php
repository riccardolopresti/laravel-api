<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $success= true;

        $validator = Validator::make($data, 
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|min:3'

            ],
            [
                'name.required' => 'Il Nome è un campo obbligatorio',
                'name.min' => 'Il Nome deve essere lungo almeno :min caratteri',
                'name.max' => 'Il Nome deve essere lungo al massimo :max caratteri',
                'email.required' => 'L\'email è un campo obbligatorio',
                'email.email' => 'L\'email è formattata in modo errato',
                'email.max' => 'L\'email deve essere lungo massimo :max caratteri',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'message.min' => 'Il messaggio deve essere lungo almeno :min caratteri',
            ]
        );

        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();



        return response()->json(compact('success'));
    }
}
