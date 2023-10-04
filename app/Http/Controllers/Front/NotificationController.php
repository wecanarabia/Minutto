<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Branch;
use App\Traits\LogTrait;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Traits\NotificationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Company\NotificationRequest;

class NotificationController extends Controller
{
    use LogTrait;

    use NotificationTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Notification::where('company_id', Auth::user()->company_id)->latest()->get();
        return view('company.notifications.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {


        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $request['company_id'] = Auth::user()->company_id;
        $notification=Notification::create($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));

        $branches = Branch::where('company_id', Auth::user()->company_id)->orderByDesc('created_at')->get();
        $FcmToken = User::whereBelongsTo($branches)->whereNotNull('device_token')->pluck('device_token')->toArray();

        $this->send($notification->body, $notification->title,$FcmToken);

        return redirect()->route('front.notifications.index')
                        ->with('success',__('views.CREATED NOTIFICATION'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notification::where('company_id', Auth::user()->company_id)->findOrFail($id);
        return view('company.notifications.show',compact('notification'));
    }
}
