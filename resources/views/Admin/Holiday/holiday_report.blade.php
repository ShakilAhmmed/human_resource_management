@extends('Admin.index')
@section('title','Holiday')
@section('breadcrumbs','Holiday')
@section('main_content')

    <div class="col-lg-12">
        <div style="    margin-left: 67px;     margin-top: 34px;" >
            <h2><i class="menu-icon ti-panel" aria-hidden="true"></i>&nbsp;HOLIDAY LIST</h2> <!-- Tab Heading  -->
            <p title="Transport Details"> HOLIDAY LIST</p> <!-- Transport Details -->
        </div>
        <hr>
        <div>
            <div class="panel-body text-left">
                <ul class='dropdown_test'>

                    <li><a href='/admin'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                    <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
                    <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
                    <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
                    <div style="float: right;">
                        <li><a href='/catagory_pdf' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></li>&nbsp;
                        <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;</a></li>&nbsp;
                        <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i></a></li>&nbsp;
                        <li><a href='/'><i class="fa fa-street-view" aria-hidden="true"></i></a></li>&nbsp;
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
        <div class="col-sm-4 form-group" style="margin-left:-170px">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                {{Form::select('status',['--select--'=>'--select--','1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'],null,['class'=>'form-control month','title'=>'holiday_status'])}}
            </div>
        </div>
    </div>


   <div class="data_view"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $(".month").change(function(){
                 var month=$(this).val();

                 $.ajax({
                     url:'/get_holiday',
                     type:'POST',
                     data:{'month':month,'_token':"{{ csrf_token() }}"},
                     success:function(data){
                         console.log(data);
                         $(".data_view").html(data);
                     }
                 });
             });
        });
    </script>

@stop