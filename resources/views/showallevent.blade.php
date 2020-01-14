@extends('layouts.template')

@section('content')
<div class="container" id="showevent">
    <table class="table table-striped text-center">
      <tr class="table-info">
          <td>Name event</td>
          <td>Time during</td>
          <td>Location</td>
          <td>Trainer</td>
          <td colspan="2">Action</td>
      </tr>
            @foreach($allevent as $event)
               
            
                <tr>
                    <td valign="bottom">{{$event->nameevent}}</td>
                    <td valign="center">{{$event->starttime }} - {{$event->endtime}}</td>
                    <td valign="center">{{ $event->address }}</td>
                    <td valign="center">{{ $event->nametrainer }}</td>
                    <td>
                          <a href="{{url('/infor/'.$event->id)}}"><button type="button" class="btn btn-outline-success">Detail</button></a>
                        @if(Auth::check() && Auth::user()->role ==1)
                          <br>
                          <a  href="{{url('/update/'.$event->id)}}"><input style="width:60px;margin-top: 10px;" type="button" class="btn btn-outline-success" name="infor" id="infor" value="Update"/></a>
                        @endif
                     </td>
                    @if(Auth::check() && Auth::user()->role ==0)
                    <td>
                          
                          <a href="{{url('/join/'.$event->id)}}"><button type="button" class="btn btn-outline-success">Join</button></a>
                    </td>
                          @elseif(Auth::check() && Auth::user()->role ==1)
                    <td>
                        <a onclick="return confirm('Are you sure delete?')" href="{{url('/delete/'.$event->id)}}"><input style="width:60px;" type="button" class="btn btn-outline-danger" name="infor" id="infor" value="Delete"/></a>
                        <br>
                        <div><input onclick="invite({{$event->id}});" style="width:60px;margin-top: 10px;" type="button" class="btn btn-outline-info" name="infor" id="infor" value="Invite" data-toggle="modal" data-target="#myModal"/></div>
                    </td>
                          @endif
                        </div>
                    </td>
                </tr>
            
            @endforeach
          </table>
</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="showuser">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  



<script>
        $(document).ready(function(){
          $('#search').keyup(function(){
           
            var nameevent=$('#search').val();
              $.ajax({
                type:'get',
                url:'/getevent',
                data:{'nameevent':nameevent},      
                success:function(data){
                  $('#showevent').html(data);

                }
                ,
                error:function(){
                    alert("loi");
                }
              });
           
          });

          
        });
      </script>
       
      <script>
       function invite(idevent){
            $.ajax({
                    type:'get',
                      url:'/notice',
                      data:{
                        'id':idevent
                      },
                      success:function(data){
                        $('#showuser').html(data);
                      }
                  });
        };

      </script>



      <script>
        function sendinvite(iduser,idevent)
        {
          
          $.ajax({
                    type:'get',
                      url:'/sendinvite',
                      data:{
                        'iduser':iduser,
                        'idevent':idevent
                      },
                      success:function(data){
                        $('#hide').hide();
                        $('success').html("add success");
                      }
                      ,
                error:function(){
                    alert("loi");
                }
                  });
                  
        }
      </script>
@endsection
