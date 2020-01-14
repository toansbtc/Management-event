@extends('layouts.template')

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row col-md-10 text-center">
            @foreach ($getinvite as $item)
                @foreach ($item as $invite)
                    <div class="row col-md-10">
                    <p>Admin 
                        @foreach ($admin as $item)
                            <b>{{$item->name}}</b>
                        @endforeach
                    
                    invited you join event : </p>&nbsp;&nbsp;&nbsp;
                    <b>{{$invite->nameevent}} </b>&nbsp;&nbsp;&nbsp;
                    <p>Time start from {{$invite->starttime}} to {{$invite->endtime}}</p>
                    </div>
                    <div class=" row col-md-2">
                    <p><a href="{{url('/acceptjoin/'.$invite->id)}}">Yes</a></p>
                    <p style="margin-left: 10px;">Or</p>
                    <p style="margin-left: 10px;"><a href="{{url('/noaccept/'.$invite->id)}}">No</a></p>
                    </div>
                    </div>
                @endforeach
                
            @endforeach
        </div>
    </div>
@endsection