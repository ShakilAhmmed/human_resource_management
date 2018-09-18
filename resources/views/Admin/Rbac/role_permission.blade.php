@extends('Admin.index')
@section('title','User Access')
@section('breadcrumbs','User Access')
@section('main_content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('error') }}
    </div>
   
@endif



@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<style>
.cutom_patter_multiple_set{ height: 165px !important;width: 86%;} 
</style>

<div class="container">
      <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Role Based Permission</h2>
      <p title="Transport Details">sssss &nbsp;Role Report</p>
       
          <div class="panel panel-default text-right" >
            <div class="panel-body">
              <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
                <li>
                  <a href='#'>
                    <i class="fa fa-child" aria-hidden="true">
                    </i> Role Based Permission
                  </a>
                </li>
              </ul>
            </div>
          </div>
     

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/create_admin'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create Admin</a></li>
            <li><a href='/create_permission'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create Permission</a></li>
            <li><a href='/user_access'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;User acess</a></li>
            
            <li><a href='/'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>


</div>







      <div class="tab-content">
          <div class="modal fade"  id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-child" aria-hidden="true"></i> &nbsp;Add role</h4>
                    </div>
              

                    <div class="modal-body">
                      <div class="widget-content padding">
                        {{Form::open(['url'=>'/role_permission','method'=>'post','class'=>'form-horizontal','name'=>'basic_validate','id'=>'basic_validate'])}}
                            
                              
                                  <div class="control-group">
                                      <label class="control-label"> Role</label>
                                      <div class="controls">
                                      
                                          @foreach($role as $auth_role)
                                            @php $auth_role_array[$auth_role->id]=$auth_role->display_name @endphp
                                          @endforeach
                                      
                                        {{Form::select('role_id',$auth_role_array,null,['class'=>'form-control'])}}
                                      </div>
                                  </div>
                                
                                  <div class="control-group">
                                      <label class="control-label"> Select Role  permission</label>
                                      <div class="controls">
                                      @php $content_permission_array=[] @endphp
                                      @foreach($all_permission as $content_permission)
                                        @if($content_permission->description=="Content Permission")
                                        @php $content_permission_array[$content_permission->id]=$content_permission->display_name @endphp
                                        @endif
                                      @endforeach
                                      {{Form::select('content_permission[]',$content_permission_array, null, ['style'=>'height: 100px','multiple'=>''])}}
                                       
                                      </div>
                                  </div>


                                  <div class="control-group">
                                      <label class="control-label"> Select Module permission</label>
                                      <div class="controls">
                                        
                                         @foreach($all_permission as $module_permission)
                                          @if($module_permission->description=="MODULE")
                                              @php $module_permission_array[$module_permission->id]=$module_permission->display_name @endphp
                                          @endif
                                          @endforeach
                                        {{Form::select('content_permission[]',$module_permission_array, null, ['style'=>'height: 100px','multiple'=>'','class'=>'cutom_patter_multiple_set'])}}
                                         
                                      </div>
                                  </div>



                                  <div class="control-group">
                                      <label class="control-label"> Select Module  Based Feature permission</label>
                                      <div class="controls">
                                        @foreach($all_permission as $feature_permission)
                                          @if($feature_permission->description=="Feature")
                                              @php $feature_permission_array[$feature_permission->id]=$feature_permission->display_name @endphp
                                          @endif
                                          @endforeach
                                        {{Form::select('content_permission[]',$feature_permission_array, null, ['style'=>'height: 100px','multiple'=>'','class'=>'cutom_patter_multiple_set'])}}
                                         
                                      </div>
                                  </div>
                           
                          
                        </div>
                    </div>


                    <div class="modal-footer">
                    @permission('INSERT')
                      <input type="submit" value="Submit" class="btn btn-success" style="float:left;">
                     @endpermission
                   
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    {{Form::close()}}
                </div>
              </div>
            </div>
        </div>
                        <div class="widget-box" >
                          
                          <div class="widget-title">
                            <span class="icon"><i class="icon-th"></i></span>
                            <h5>Role Based Permission</h5>
                          </div>

                          <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                              
                                    <thead>
                                      <tr>
                                        <th>Role Name</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($create_permission_role as $role_permission)
                                     @php $permission_name=DB::table('roles')->where('id',$role_permission->role_id)->first(); @endphp
                                      <tr class="gradeX">
                                        <td>{{$permission_name->display_name}}</td>
                                        

                                          <td id="my_align" class="display_status" style="display: inline-flex;">
                                          @permission('EDIT')
                                          {{Form::open(['url'=>"/role_permission/$permission_name->id/edit",'method'=>'GET'])}}
                                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                                          {{Form::close()}}
                                         @endpermission
                                             @permission('DELETE')
                                          {{Form::open(['url'=>"/role_permission/$permission_name->id",'method'=>'DELETE'])}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                          {{Form::close()}}
                                        @endpermission
                                        
                                        </td>
                                      </tr>
                                      @endforeach
                                 
                                      
                                    </tbody>

                              </table>
                          </div>
                        </div>
                      </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  
   $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/role_based_permission_pdf_report');

          w.onload = function()
          {
              w.print();
          };
      
    });
});
</script>
@stop
