@extends('layouts.template')

@section('content')
    <div class="container" id="showevent">
            <table class="table tab-navigation">
                <tr class="table-danger">
                    <td>Name event</td>
                    <td>Time during</td>
                    <td>Location</td>
                    <td>trainer name</td>
                </tr>
                    @foreach($yourevent as $allevent)
                        @foreach ($allevent as $event)
                                <tr>
                                    <td>{{$event->nameevent}}</td>
                                    <td>{{$event->starttime }} - {{$event->endtime}}</td>
                                    <td>{{ $event->address }}</td>
                                    <td>{{ $event->nametrainer }}</td>
                                </tr>
                        @endforeach
                    @endforeach
            </table>
    </div>
@endsection