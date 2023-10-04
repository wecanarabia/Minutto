<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Traits\LogTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\PageRequest;

class PageController extends Controller
{
    use LogTrait;

    public function showInternal(){
        $page = Page::whereType('Internal System')->where('company_id',Auth::user()->company_id)->first();
        if (!$page) {
            $page=Page::Create([
                'company_id' => Auth::user()->company_id,
                'title'=>Page::TITLES[0],
                'content'=>Page::BODY,
                'type' => 'Internal System',

            ]);
        }
        return view('company.pages.internal',compact('page'));
    }

    public function updateInternal(PageRequest $request){
        $page = Page::whereType('Internal System')->where('company_id',Auth::user()->company_id)->first();
        $request['content']=['en'=>$request->english_content,'ar'=>$request->arabic_content];
        $page->update($request->only('content'));
        if ($page) {
            $this->addLog(NULL, 'Update Internal System', 'تعديل النظام الداخلي', ' Internal System has been updated successfully', 'تم تعديل النظام الداخلي  بنجاح');
        }
        return redirect()->route('front.pages.internal')
        ->with('success',__('views.UPDATED INTERNAL SYSTEM'));
    }

    public function showDeparturVacation(){
        $page = Page::whereType('Departures And Vacations')->where('company_id',Auth::user()->company_id)->first();
        if (!$page) {
            $page=Page::Create([
                'company_id' => Auth::user()->company_id,
                'title'=>Page::TITLES[1],
                'content'=>Page::BODY,
                'type' => 'Departures And Vacations',

            ]);
        }
        return view('company.pages.departure-vacation',compact('page'));
    }

    public function updateDeparturVacation(PageRequest $request){
        $page = Page::whereType('Departures And Vacations')->where('company_id',Auth::user()->company_id)->first();
        $request['content']=['en'=>$request->english_content,'ar'=>$request->arabic_content];
        $page->update($request->only('content'));
        if ($page) {
            $this->addLog(NULL, 'Update Departures And Vacations System', 'تعديل نظام الاجازات والمغادرات', ' Departures And Vacations System has been updated successfully', 'تم تعديل نظام الاجازات والمغادرات  بنجاح');
        }
        return redirect()->route('front.pages.departure-vacation')
        ->with('success',__('views.UPDATED DEPARTURE VACATION SYSTEM'));
    }
}
