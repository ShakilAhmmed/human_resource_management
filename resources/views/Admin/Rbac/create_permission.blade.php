@extends('Admin.index')
@section('title','Cheak Permission')
@section('breadcrumbs','Cheak Permission')
@section('main_content')
<div style="border: 1px solid brown;background: red;color: #f7f7f7;width: 402px;margin-left: 1123px;
"><h2>Note</h2>
<p title="Transport Details text-primary" style="color: #f7f7f7;">You Can Not Change The Permit</p></div>
 <div style="    margin-left: 67px;     margin-top: 34px;" >
      <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;Cheak Your Permission</h2> <!-- Tab Heading  -->
         <p title="Transport Details">  Cheak Your Permission Details</p> <!-- Transport Details -->
     </div>
     <hr>
<div class="container">

   


  

<h3 class='text-center'>Form Permission</h3>
<div class="tab-content">
  <table class="table table-striped">
    <thead>
      <tr class="larger_font_permission">
        <th>Access Form</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="Content Permission")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
     
    </tbody>
  </table>
</div>
</div>



<h3 class='text-center'>Module Permission</h3>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Access Form</th>
        <th>Description</th>
        <th> Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="MODULE")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
      
    </tbody>
  </table>
</div>



<h3 class='text-center'>Feature Permission</h3>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Access Form</th>
        <th>Description</th>
        <th> Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="Feature")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
      
    </tbody>
  </table>
</div>

@stop