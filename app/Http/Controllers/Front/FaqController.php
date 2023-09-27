<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\FaqRequest;

class FaqController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Faq::where('company_id',Auth::user()->company_id)->latest()->get();
        return view('company.faqs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $request['question']=['en'=>$request->question_en,'ar'=>$request->question_ar];
        $request['answer']=['en'=>$request->answer_en,'ar'=>$request->answer_ar];
        $request['company_id'] = Auth::user()->company_id;
        Faq::create($request->except([
            'question_en',
            'question_ar',
            'answer_en',
            'answer_ar',
        ]));


        return redirect()->route('front.faqs.index')
                        ->with('success','Faq has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faq = Faq::where('company_id',Auth::user()->company_id)->findOrFail($id);
        return view('company.faqs.show',compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::where('company_id',Auth::user()->company_id)->findOrFail($id);
        return view('company.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, string $id)
    {
        $faq = Faq::findOrFail($id);
        $request['question']=['en'=>$request->question_en,'ar'=>$request->question_ar];
        $request['answer']=['en'=>$request->answer_en,'ar'=>$request->answer_ar];
        $faq->update($request->except([
            'question_en',
            'question_ar',
            'answer_en',
            'answer_ar',
        ]));


        return redirect()->route('front.faqs.index')
                        ->with('success','Faq has been updated successfully');
    }
}
