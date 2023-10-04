<?php

namespace App\Http\Controllers\Front;

use App\Models\Message;
use App\Traits\LogTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\MessageRequest;

class MessageController extends Controller
{
    use LogTrait;

       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Message::where('company_id',Auth::user()->company_id)->orderByDesc('created_at')->get();
        return view('company.messages.index',compact('data'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $request['company_id'] = Auth::user()->company_id;
        $message = Message::create($request->except([
            'english_body',
            'arabic_body',
        ]));

        if ($message) {
            $this->addLog(NULL, 'Create Message', 'إضافة رسالة', 'Message has been created successfully', 'تم إضافة رسالة  بنجاح');
        }



        return redirect()->route('front.messages.show')
                        ->with('success',__('views.CREATED MSG'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $message = Message::where('company_id',Auth::user()->company_id)->latest()->firstOrFail();
        return view('company.messages.show',compact('message'));

    }
    public function update(MessageRequest $request, )
    {
        $message = Message::where('company_id',Auth::user()->company_id)->latest()->firstOrFail();
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $request['company_id'] = Auth::user()->company_id;
        $message->update($request->except([
            'english_body',
            'arabic_body',
        ]));
        if ($message) {
            $this->addLog(NULL, 'Update Message', 'تعديل رسالة', 'Message has been updated successfully', 'تم تعديل رسالة  بنجاح');
        }

        return redirect()->route('front.messages.show')
                        ->with('success',__('views.UPDATED MSG'));
    }
}
