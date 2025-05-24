<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Response;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function getFormData()
    {
        return response()->json([
            'status' => 'success',
            'data' => [
                'forbiddenDates' => ['6/5', '6/6', '6/7']
            ]
        ]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'name' => 'required|string|max:20',
            'date' => 'required|array|min:1',
            'food' => 'nullable|array',
            'remark' => 'nullable|string|max:200',
        ]);

        $forbiddenDates = ['6/5', '6/6', '6/7'];
        $selectedDates = $request->date;

        $intersect = array_intersect($forbiddenDates, $selectedDates);

        if (!empty($intersect)) {
            $forbiddenList = implode(' ', $intersect);
            return response()->json([
                'status' => 'error',
                'message' => "我有說過不行，你還選 $forbiddenList ，重填",
                'errors' => [
                    'date' => ["我有說過不行，你還選 $forbiddenList ，重填"]
                ]
            ], 422);
        }

        $response = Response::create([
            'answer' => $request->answer,
            'name' => $request->name,
            'date' => implode(',', $request->date),
            'food' => $request->food ? implode(',', $request->food) : '',
            'remark' => $request->remark
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $response
        ], 201);
    }

    public function getResponses()
    {
        $responses = Response::latest()->get();
        return response()->json([
            'status' => 'success',
            'data' => $responses
        ]);
    }
} 