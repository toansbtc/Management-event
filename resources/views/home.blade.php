@extends('layouts.template')

@section('content')
<div class="container">
            <div class="col-md-6 text-center" style="margin-left:25%; "><h4 style="text-align: center; margin-top: 10px;">Nearly events</h4></div>
            @foreach($data as $event)
                <hr>
                <div class="row justify-content-center col-md-9" style=" margin-left: 10%;margin-top: 2%;">
                    <div class="col-md-2 text-center" style="text-decoration-color: black;margin-top: 8%;margin-right: 40px;"> <h4>{{$event->nameevent}}</h4></div>
                    <div class="col-md-8 navbar-toggler" style="margin-top: 5%;">
                        <p>Time during:{{$event->starttime }} - {{$event->endtime}}</p>
                        <p>Location: {{ $event->address }}</p>
                        <p>Trainner:{{ $event->nametrainer }}</p>
                    
                    </div>
                    <div  style=";margin-top: 10%;">
                        <a href="{{url('/infor/'.$event->id)}}"><button type="button" class="btn btn-outline-info">Detail</button></a>  
                
                    </div>
                </div>    
                <hr>
                <br>
            
            @endforeach
</div>
@endsection
