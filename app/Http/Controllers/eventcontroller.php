<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\userevent;
use App\invite;
use Illuminate\Support\Facades\Auth;

class eventcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        //
            $allevent=event::all();
            return view('showallevent')->with(compact('allevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$validatedData = $request->validate([
            'name' => 'required',
            'starttime' => 'bail|required|alpha|min:6|max:10',
            'endtime' => 'bail|required',
            'introduct' => 'bail|required',
            'location' => 'required',
        ]);*/
        $data=$request->all();
        $event=new event();
        $event->nameevent =$data['nameevent'];
        $event->starttime=$data['starttime'];
        $event->endtime=$data['endtime'];
        $event->address=$data['location'];
        $event->nametrainer=$data['trainner'];
        $event->introduct=$data['introduct'];
        $event->creator=auth::user()->name;
        $event->save();

    

        return redirect('/home');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acceptjoin($id)
    {
            $join =new userevent();
            $join->idevent=$id;
            $join->iduser=Auth::user()->id;
            $join->save();
            invite::where('iduser',Auth::user()->id)->where('idevent',$id)->delete();
        return redirect('/user/event/yourevent');
    }

    public function noaccept($id)
    {
        invite::where('iduser',Auth::user()->id)->where('idevent',$id)->delete();
        return redirect('/shownotice');
    }

    public function join($id)
    {
        $join =new userevent();
        $join->idevent=$id;
        $join->iduser=Auth::user()->id;
        $join->save();
        $detailevent=event::where('id','=',$id)->get();
        $countuser=userevent::where('idevent','=',$id)->get()->count();
        if($countuser)
        return view('detailevent')->with(compact('detailevent','countuser'));
    else {
            $countuser=0;
        return view('detailevent')->with(compact('detailevent','countuser'));
    }
    }
    public function yourevent()
    {
        $id=Auth::user()->id;
        $idevent=userevent::where('iduser','=',$id)->get();
        //$yourevent= event::where('id',1)->get();
        $yourevent=collect([]);
        foreach($idevent as $id)
        {
            $yourevent  ->push(event::where('id',$id->idevent)->get());
            //$yourevent[].add($event);
            
        }//dd($yourevent);
        //$yourevent=json_decode(json_encode($yourevent));      
       // dd($yourevent);
        return view('yourevent')->with(compact('yourevent'));
    }
    public function show($id)
    {
        //
        $detailevent=event::where('id','=',$id)->get();
        $countuser=userevent::where('idevent','=',$id)->get()->count();
        if($countuser)
            return view('detailevent')->with(compact('detailevent','countuser'));
        else {
            $countuser=0;
            return view('detailevent')->with(compact('detailevent','countuser'));
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($countuser)
            return view('detailevent')->with(compact('detailevent','countuser'));
        else {
            return view('detailevent')->compact('detailevent');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formupdate($id)
    {
            $event = event::find($id);
            return view('updateevent',compact('event'));
            //echo $event;
    }
    public function update(Request $request, $id)
    {
        //
        $event = event::find($id);
        $event->update($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        event::where('id','=',$id)->delete();
        userevent::where('idevent','=',$id)->delete();
        return redirect('allevent');
    }

    public function search(Request $request)
    {
        
        $data = $request->all();
        $search=$data['nameevent'];
        $output=null;

        if($search=="")
            $getevent=$data = event::all();
        else
        {
            $getevent=event::where('nameevent', 'LIKE', "%".$search."%")->get();
            
        }
        if($getevent)
        {
            $output .='<table class="table table-striped text-center">
                <tr class="table-info">
                    <td>Name event</td>
                    <td>Time during</td>
                    <td>Location</td>
                    <td>Trainer</td>
                    <td colspan="3">Action</td>
                </tr>';
          foreach ($getevent as $key => $event) {


            
           
            
            $output .=' <tr>
                    <td>'.$event->nameevent.'</td>
                    <td>'.$event->starttime .' - '.$event->endtime.'</td>
                    <td>'.$event->address .'</td>
                    <td>'.$event->nametrainer .'</td>
                    <td>
                    <a href="/infor/'.$event->id.'"><input style="width:60px;" type="button" class="btn btn-outline-success" name="infor" id="infor" value="detail"></a>
                    </td>';
                    if(Auth::check() && Auth::user()->role ==0){
                       $output.= '<td>
                          
                          <a href="/join/'.$event->id.'"><button type="button" class="btn btn-outline-success">Join</button></a>
                        </td>';
                    }
                    else if(Auth::check() && Auth::user()->role ==1){
                       $output.=' <td>
                                <a onclick="return confirm(Are you sure?)" href="/delete/'.$event->id.'"><input style="width:60px;" type="button" class="btn btn-outline-danger" name="infor" id="infor" value="delete"/></a></td>
                        <td>      
                                <a href="/update/'.$event->id.'"><input style="width:60px;" type="button" class="btn btn-outline-success" name="infor" id="infor" value="update"/></a>
                        </td> '; 
                    }
                    $output.='
                        </div>
                    </td>
                </tr>';
            }
        }
        
        return Response($output);
    }
}
