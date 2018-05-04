@extends('Admin.index')
@section('title','Designation Edit')
@section('breadcrumbs','Designation Edit')
@section('main_content')


     <div class="col-lg-12">
     <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;EDIT DESIGNATION</h2> <!-- Tab Heading  -->
         <p title="ADD DESIGNATION DETAILS">  EDIT DESIGNATION DETAILS</p> <!-- Transport Details -->
     </div>
@if(session('success'))
   <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
 @endif
   <div class="card">
        <div class="card-header">
            <h4>{{$edit_data->designation_name}}</h4>
        </div>
        <div class="card-body">
          {{Form::open(['url'=>"/designation/$edit_data->designation_id",'method'=>'put'])}}
                          <div class="col-xs-12 col-sm-12">
                            <div class="card-body card-block">
                                <div class="form-group">
                                {{Form::label('department','Department',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                   {{Form::select('department',[$edit_data->department=>$edit_data->department,'Test'=>'Test','Department'=>'Department'],null,['class'=>'form-control','title'=>'department'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('department')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('designation_name','Designation Name',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                        {{Form::text('designation_name',$edit_data->designation_name,['class'=>'form-control','title'=>'designation_name'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_name')}}</div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('designation_description','Designation Description',['class'=>'form-control-label'])}}
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                     {{Form::textarea('designation_description',$edit_data->designation_description,['class'=>'form-control','title'=>'designation_description','rows'=>'4','cols'=>'4'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_description')}}</div>
                                </div>
                                <div class="form-group">
                                {{Form::label('designation_status','Designation Status',['class'=>'form-control-label'])}}

                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                       {{Form::select('designation_status',[$edit_data->designation_status=>$edit_data->designation_status,'Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'designation_status'])}}
                                    </div>
                                    <div style="color: red;">{{$errors->first('designation_status')}}</div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                       {{Form::submit('UPDATE',['class'=>'btn btn-success','style'=>'background:#4834d4;'])}}
                                    </div>
                                </div>
                            </div>
                    </div>  
                    {{Form::close()}}  
                  </div>
                 </div>
 @stop