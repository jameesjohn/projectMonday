<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use App\Models\Level;
use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    private $notification;

	public function __construct(NotificationRepository $notification ) {
    	$this->middleware('auth');
    	// $this->middleware('lecturer');

        $this->notification = $notification;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != 'lecturer'){
            $conditionsGeneral = [
                    ['type', 'general'],
                ];
            $conditionsLevel = [
                    ['level_id', Auth::user()->level_id],
                    ['type', 'level'],
                ];
            $data['levelInformations'] = Notification::where($conditionsLevel)->paginate(5);
            $data['generalInformations'] = Notification::where($conditionsGeneral)->paginate(5);
            return view('students.information',$data);
        }else{

            $data['levelInformations'] = Notification::where($conditions)->paginate(5);
            return view('students.information',$data);
        }
        return view('students.information');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['levels'] = Level::all();
        return view('lecturer.notification',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->except(['_token']);
         $notification = $this->notification->fillAndSave($data);

    	if($notification) {
    		return redirect('/lecturer/classes')->with('message', 'Announcement Made');
	    }

	    return ['error' => 'Cannot create a class'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show($notification)
    {
        $data = $this->notification->getByAttributes(['id' => $notification], 'AND');
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
