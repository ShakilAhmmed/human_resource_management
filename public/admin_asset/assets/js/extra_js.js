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

        });

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