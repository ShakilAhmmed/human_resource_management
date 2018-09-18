@extends('Admin.index')
@section('title','User Access')
@section('breadcrumbs','User Access')
@section('main_content')


@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible ">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible ">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Error!</strong> {{ Session::get('error') }}
    </div>
   
@endif

@if (Session::has('success_failed'))
    <div class="alert alert-danger alert-dismissible ">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;{{ Session::get('success_failed') }}</strong>
    </div>
   
@endif





<h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Role Configuration</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{config('app.name')}} &nbsp;Role Configuration</p> <!-- Transport Details -->
    <p class="color_black">Role:{{$admin_info->display_name}}<br>Select Role All Permission</p>




<div style='width: 50%;float: left;'>




        <div class="widget-box" style="margin-left: 20%;">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add New Permission (Content Permission) </h5>
          </div>
          <div class="widget-content nopadding">
              
                 <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">

                        @foreach($current_role as $form_role)
                          @if($form_role->description=="Content Permission")
                        <input type="checkbox" checked > {{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                      </div>
                    </div>
                  </form>
              


              
              {{Form::open(['url'=>"/role_permission/$admin_info->id",'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate'])}}
                 
                    <div class="control-group">
                      <label class="control-label">Current Permission</label>
                      <div class="controls">

                        @foreach($permission as $contact_permission)
                          @if($contact_permission->description=="Content Permission")
                          {{Form::checkbox('permission_id[]',$contact_permission->id)}}{{$contact_permission->display_name}}<br>
                          
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-success' value='Add New Role' >
                      </div>
                    </div>
               {{Form::close()}}
             
          </div>
        </div>





    <div class="widget-box" style="margin-left: 20%;">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add New Module</h5>
          </div>
          <div class="widget-content nopadding">
             
                 <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                      <label class="control-label">Current Module Permission</label>
                      <div class="controls">
                        @foreach($current_role as $form_role)
                          @if($form_role->description=="MODULE")
                        <input type="checkbox" checked> {{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                      </div>
                    </div>
                  </form>
              


              
                {{Form::open(['url'=>"/role_permission/$admin_info->id",'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate'])}}
                    <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">
                        @foreach($permission as $contact_permission)
                          @if($contact_permission->description=="MODULE")
                          {{Form::checkbox('permission_id[]',$contact_permission->id)}}{{$contact_permission->display_name}}<br>
                          
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-success' value='Add New Role' >
                      </div>
                    </div>
                  {{Form::close()}}
              
          </div>
        </div>


        <div class="widget-box" style="margin-left: 20%;">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add New Feature</h5>
          </div>
          <div class="widget-content nopadding">
              
                 <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                      <label class="control-label">Current Feature Permission</label>
                      <div class="controls">
                        @foreach($current_role as $form_role)
                          @if($form_role->description=="Feature")
                        <input type="checkbox" checked> {{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                      </div>
                    
                  </form>
              </div>


              
                 {{Form::open(['url'=>"/role_permission/$admin_info->id",'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate'])}}
                   <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">
                        @foreach($permission as $contact_permission)
                          @if($contact_permission->description=="Feature")
                          {{Form::checkbox('permission_id[]',$contact_permission->id)}}{{$contact_permission->display_name}}<br>
                          
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-success' value='Add New Role' >
                      </div>
                    </div>
                {{Form::close()}}
             
          </div>
        </div>

</div>











<!-- Remove Role -->







<div style='width: 50%;float: right;'>




        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Remove Role</h5>
          </div>
          <div class="widget-content nopadding">
             

              {{Form::open(['url'=>"/extra_operation/$admin_info->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate'])}}
                 
                    <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">
                        @foreach($current_role as $form_role)
                          @if($form_role->description=="Content Permission")
                            {{Form::checkbox('delete_permission[]',$form_role->id)}}{{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-danger' value='Remove Role' >
                      </div>
                    </div>
                 {{Form::close()}}
              
          </div>
        </div>





    <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Remove Module</h5>
          </div>
          <div class="widget-content nopadding">
              


              
                 {{Form::open(['url'=>"/extra_operation/$admin_info->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate'])}}
                   <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">
                       @foreach($current_role as $form_role)
                          @if($form_role->description=="MODULE")
                            {{Form::checkbox('delete_permission[]',$form_role->id)}}{{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-danger' value='Remove Module' >
                      </div>
                    </div>
                 {{Form::close()}}
              
          </div>
        </div>


        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Remove Feature</h5>
          </div>
          <div class="widget-content nopadding">
              

              
                 {{Form::open(['url'=>"/extra_operation/$admin_info->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate'])}}
                    <div class="control-group">
                      <label class="control-label">Permitted Role</label>
                      <div class="controls">
                        @foreach($current_role as $form_role)
                          @if($form_role->description=="Feature")
                            {{Form::checkbox('delete_permission[]',$form_role->id)}}{{$form_role->display_name}}<br>
                          @endif
                        @endforeach
                        <br><input type="submit" class='btn btn-danger' value='Remove Feature' >
                      </div>
                    </div>
                {{Form::close()}}
              
          </div>
        </div>

</div>

  @stop