@extends('layouts.template')

@section('content')
<div class="container" id="showevent">
    @foreach($detailevent as $event)
                <hr>
                <div class="col-md-8 justify-content-center col-md-9" style=" margin-left: 10%;margin-top: 2%;">
                    <div class="row text-center" style="text-decoration-color: black;margin-top: 8%; margin-left: 40%;"> <h3>{{$event->nameevent}}</h3></div>
                    <div class="row navbar-toggler" style="margin-top: 5%;">
                        <div class="col-md-6">
                            <div class="row">
                                    <p><b>creator</b>: {{ $event->creator }}</p>
                                    <p><b>date create</b>:{{ $event->created_at }}</p>
                            </div>
                        </div>    
                            
                            <p><b>location:</b> {{ $event->address }}</p>
                            <div class="col-md-12" style="padding-left: 0px;">
                                    <p><b>Time during: </b>{{$event->starttime }} -- {{$event->endtime}}</p><br>
                                    <p><b>trainner:</b>{{ $event->nametrainer }}</p>
                            </div>
                            <div class="col-md-10" style="padding-left: 0px;">
                                <p><b>introduct:</b><br>{{ $event->introduct }}</p>
                                <p><b>number of student join:</b><b>{{ $countuser }}</b></p>
                            </div>
                       
                    </div>
                    
                </div>    
                <hr>
                <br>
    @endforeach

</div>

@endsection
