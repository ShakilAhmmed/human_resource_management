      //for file
      function readURL(input) {
            if (input.files && input.files[0])
            {
              var reader = new FileReader();
              reader.onload = function (e) {
                $('#blah')
                  .attr('src', e.target.result)
                  .width(200)
                  .height(200);
              };
              reader.readAsDataURL(input.files[0]);
            }
          }

         //for employee add more field 

        $(document).ready(function() {

            var max_fields      = 10; //maximum input boxes allowed  <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append("<div style='line-height: 40px;'>\
                      <table style='margin-top: -37px;'>\
                     <tr>\
                      <td>\
                       <input type='text' class='form-control' name='company_name[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                       <input type='text' class='form-control' name='job_department[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      <td>\
                         <input type='text' class='form-control' name='designation[]'  style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                        <input type='date' class='form-control' name='start_date[]'  style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      <td>\
                        <input type='date' class='form-control' name='end_date[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      </tr>\
                     <button class='btn btn-danger remove_field' style='width: 195px;margin-left: 1101px;'>Remove</button>\
                     </table>\</div>"); //add input box
                }
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })


            //documents

            var max_fields_documents      = 10; //maximum input boxes allowed  <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
            var wrapper_documents         = $(".input_fields_wrap_documents"); //Fields wrapper
            var add_button_documents      = $(".add_field_button_documents"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button_documents).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields_documents){ //max input box allowed
                    x++; //text box increment
                    $(wrapper_documents).append("<div style='line-height: 40px;'>\
                      <table style='margin-top: -37px;'>\
                     <tr>\
                      <td>\
                       <input type='text' class='form-control' name='document_file_name[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                       <input type='file' class='form-control' name='document[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      </tr>\
                     <button class='btn btn-danger remove_field_documents' style='width: 195px;margin-left: 452px;'>Remove</button>\
                     </table>\</div>"); //add input box
                }
            });
            $(wrapper_documents).on("click",".remove_field_documents", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })


//FOR PASSWORD
$("#pass").keyup(function(){
		var pass=$(this).val().length;
		if(pass<9)
		{
		$("#msg").html("<font color='red'>Password Weak</font>");
		}
		else
		{
		$("#msg").html("<font color='green'>Password Strong</font>");
		}
});
$("#cpass").keyup(function(){
		var mpass=$("#pass").val();
		var cpass=$("#cpass").val();
		if(mpass==cpass)
		{
		$("#msg_err").html("<font color='green'>Password Matched</font>");
		}
		else
		{
		$("#msg_err").html("<font color='red'>Password Not Matched</font>");
		}
});

//for notice
$(".to").change(function(){
    var id=$(this).val();
    $.ajax({
        url:'/personal_details',
        type:'POST',
        data:{'id':id,'_token': $('input[name=_token]').val()},
        success:function(data){
          console.log(data);
          $(".email").val(data.email);
          $(".phone").val(data.phone);
          $(".profile").attr("src",data.profile_image);
        }
    });
});


//notice

$(".type").change(function(){
   var type=$(this).val();
   if(type=="Individual")
   {
      $(".individual").show();
   }
   else
   {
     $(".individual").hide();
   }
});

//allowances
      var max_fields_allowances     = 10; //maximum input boxes allowed  <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
      var wrapper_allowances         = $(".allowances"); //Fields wrapper
      var allowances_button      = $(".allowances_button"); //Add button ID

      var x = 1; //initlal text box count
      $(allowances_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields_allowances){ //max input box allowed
              x++; //text box increment
              $(wrapper_allowances).append("<div style='line-height: 40px;margin-left: 28.5%;'>\
                      <table style='margin-top: -37px;'>\
                     <tr>\
                      <td>\
                       <input type='text' class='form-control' name='allowances_type[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                       <input type='text' class='form-control allowances_amount' name='allowances_amount[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      </tr>\
                     <button class='btn btn-danger remove_field_allowances' style='width: 195px;margin-left: 452px;'>Remove</button>\
                     </table>\</div>"); //add input box
          }
      });
      $(wrapper_allowances).on("click",".remove_field_allowances", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })

 //deductions
      var max_fields_deductions    = 10; //maximum input boxes allowed  <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
      var wrapper_deductions        = $(".deductions"); //Fields wrapper
      var deductions_button      = $(".deductions_button"); //Add button ID

      var x = 1; //initlal text box count
      $(deductions_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields_allowances){ //max input box allowed
              x++; //text box increment
              $(wrapper_deductions).append("<div style='line-height: 40px;margin-left: 28.5%;'>\
                      <table style='margin-top: -37px;'>\
                     <tr>\
                      <td>\
                       <input type='text' class='form-control' name='deductions_type[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                       <input type='text' class='form-control deductions_amount' name='deductions_amount[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      </tr>\
                     <button class='btn btn-danger remove_field_deductions' style='width: 195px;margin-left: 452px;'>Remove</button>\
                     </table>\</div>"); //add input box
          }
      });
      $(wrapper_deductions).on("click",".remove_field_deductions", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
 //Payslip Department wise Employee
      $(".department").change(function () {
          var department_name=$(this).val();
          $.ajax({
              url:'/department_employee',
              type:'POST',
              data:{'department_name':department_name,'_token': $('input[name=_token]').val()},
              success:function(data){
                  if(data[0])
                  {
                      $(".employee_name").html("");
                      for(var i=0;i<=data.length;i++)
                      {
                          $(".employee_name").append("<option value='"+data[i].joining_sallary+"'>"+data[i].name+"</option>");
                      }
                  }
                  else
                  {
                      $(".employee_name").append("<option>No Data Found</option>");
                  }
              }
          });
      });
   //Show Payslip Form
   $(".show").click(function(){
     $(".show_form").fadeIn(2000);
   });

 //Employee Salary Get
      $(".employee_name").change(function(){
          var employee_salary=$(this).val();
          $("#basic").val(employee_salary);
          $("#net_salary").val(employee_salary);
      });


      //Total Allowances
            $(document).on("click", ".allowances_calculate", function() {
                var sum = 0;
                $(".allowances_amount").each(function(){
                    sum += +$(this).val();
                });

                $(".allowances_total").val(sum);
                var basic=parseInt($("#basic").val());
                var deduction=parseInt($(".deductions_total").val());
                var final=parseInt((basic+sum)-deduction);
                $("#net_salary").val(final);
            });

        //Total Deductions
        $(document).on("click", ".deductions_calculate", function() {
            var sum_deduction = 0;
            $(".deductions_amount").each(function(){
                sum_deduction += +$(this).val();
            });
            $(".deductions_total").val(sum_deduction);

            var basic=parseInt($("#basic").val());
            var sum_allowances=parseInt($(".allowances_total").val());
            var final_total=parseInt((basic+sum_allowances)-sum_deduction);
            $("#net_salary").val(final_total);

        });

        //Check Number Or Character
            $(document).on("keydown",".allowances_amount,.deductions_amount",function(e){
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });


});
