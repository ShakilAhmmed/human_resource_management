@extends('Admin.index')
@section('title','Role Eidt')
@section('breadcrumbs','Role Edit')
@section('main_content')
     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;ADD Role</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  ADD Role DETAILS</p> <!-- Transport Details -->
     </div>
     <hr>

@if(session('success'))
   <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
 @endif
                          
                               
                                    
                                    <!-- tab end -->
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                        <!-- first tab -->
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>    ADD SETTINGS FROM</h4>
                                </div>
                                 <div class="card-body">
                                             <div class="col-xs-12 col-sm-12">
                              {{Form::open(['url'=>"/create_role/$edit_data->id",'files'=>true,'method'=>'put'])}}

                            <div class="card-body card-block">
                               
                                <div class="form-group">
                                     {{Form::label('role_name','Role Name',['class'=>'control-label','title'=>'role_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                      
                                        {{Form::text('role_name',$edit_data->role_name,['id'=>'required','placeholder'=>'Role Name','title'=>'role_name','class'=>'form-control'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('role_name')}}</small>
                                </div>
                                 <div class="form-group">
                                     {{Form::label('description','Description',['class'=>'control-label','title'=>'role_name'])}}
                                   
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></div>                                      
                                        {{Form::textarea('description',$edit_data->description,['col'=>'20','rows'=>'4','title'=>'description'])}}
                                    </div>
                                    <small class="form-text" style="color: red;">{{$errors->first('description')}}</small>
                                </div>



                               
                                   <div class="input-group input-icon right">
                                 {{Form::submit('Save',['class'=>'btn btn-success submit','style'=>'margin-bottom: 55px;margin-left: 101px;'])}}
                                </div>
                            </div>
                    </div> 
                    {{Form::close()}}                    
            </div>
            </div>
            </div>
          <!--   end first tab -->
                              </div>
                            </div>
  
@stop