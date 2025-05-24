<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
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

        // 比對交集
        $intersect = array_intersect($forbiddenDates, $selectedDates);

        if (!empty($intersect)) {
            $forbiddenList = implode(' ', $intersect);
            return back()->withErrors([
                'date' => "我有說過不行，你還選 $forbiddenList ，重填"
            ])->withInput();
        }

        $response = Response::create([
            'answer' => $request->answer,
            'name' => $request->name,
            'date' => implode(',', $request->date),
            'food' => $request->food ? implode(',', $request->food) : '',
            'remark' => $request->remark
        ]);

        // 存入 Session
        Session::flash('response', $response);

        return redirect('/thanks');
    }

    public function thankYou()
    {
        $responses = Response::latest()->get(); // 撈全部，照最新時間排序
        return view('thanks', compact('responses'));
    }
}
