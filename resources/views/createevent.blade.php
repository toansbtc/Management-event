@extends('layouts.template')

@section('content')


        <div class="container">
  
            <section class="panel panel-default">
          <div class="panel-heading"> 
          <h3 class="panel-title">New event</h3> 
          </div> 
          <div class="panel-body">
            
          <form method="POST" action="{{ url('/newevent') }}" enctype="multipart/form-data">
            @csrf
        
          
             <div class="form-group">
              <label for="name" class="col-sm-3 control-label">Name event</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nameevent" id="nameevent">
              </div>
            </div> <!-- form-group // -->
            <div class="form-group">
              <label for="name" class="col-sm-3 control-label">start time</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="starttime" id="starttime" >
              </div>
            </div> <!-- form-group // -->
            
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">end time</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="endtime" id="endtime" >
                </div>
              </div>

            <div class="form-group">
              <label for="about" class="col-sm-3 control-label">introduct event</label>
              <div class="col-sm-9">
                <textarea name="introduct" id="introduct" class="form-control"></textarea>
              </div>
            </div> <!-- form-group // -->
            <div class="row form-group" style="margin-left: 5px;">
              
              <div class="col-sm-3">
                  <label for="qty" class="col-sm-3 control-label">location</label>
                  <input type="text" class="form-control" name="location" id="location">
              </div>
              <div class="col-sm-3">
                  <label for="qty" class="col-sm-3 control-label">trainer</label>
                  <input type="text" class="form-control" name="trainner" id="trainner">
              </div>

              </div

             <!-- form-group // -->
            
            <hr>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary">create</button>
              </div>
            </div> <!-- form-group // -->
          </form>
            
          </div><!-- panel-body // -->
          </section><!-- panel// -->
          
            
          </div> <!-- container// -->



@endsection