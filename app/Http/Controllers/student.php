<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\userevent;
use App\invite;
use App\event;
use Illuminate\Support\Facades\Auth;

class student extends Controller
{



    public function getnotice(Request $request)
        {
        $data = $request->all();
        $idevent=$data['id'];
        $alluser=User::all();
        $notjoin=collect([]);
        $notice=null;
        foreach($alluser as $user)
        {
            if($user->role==0)
            {
                if(userevent::where('iduser',$user->id)->where('idevent',$idevent)->count()==0)
                $notjoin->push($user);
            }
            
        }
            foreach($notjoin as $user)
            {
                $notice.='<div class="row container text-center col-md-12">
                    <div class="col-md-8">'.$user->name.'</div>
                    <div class="col-md-4">
                        <a href="#" id="hide" onclick="sendinvite('.$user->id.','.$idevent.');" style="text-decoration: none;">Send a invite</a><p id="success"><p>
                    </div>
                </div>';
            }
            if($notice!=null)
                return Response("$notice");
            else {
                return Response("all of students joined this event");
            }
    }
    public function sendinvite(Request $request){
        $data = $request->all();
        $iduser=$data['iduser'];
        $idevent=$data['idevent'];
        $invite=new invite();
        $invite->iduser=$iduser;
        $invite->idevent=$idevent;
        $invite->idinviter=Auth::user()->id;
        $invite->save(); 
    }


    public function shownotice()
    {
        $invite=invite::where('iduser',Auth::user()->id)->get();
        $admin=User::where('id',1)->get();
       // dd($admin);
        $getinvite=collect([]);
        foreach($invite as $item)
        {
            //foreach($item as $get)
            $getinvite->push(event::where('id',$item->idevent)->get());
            
        }
        //dd(json_encode($getinvite));
        return view('notice',compact('getinvite','admin'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
