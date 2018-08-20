
function password_len_check()
{
    var password_length_for_password=$("#current_password").val().length;

    if(password_length_for_password <8)
    {
        $("#current_password_block").html("<font color='red'>password weak</font>");
    }
    else
    {
        $("#current_password_block").html("<font color='green'>password strong</font>");
    }

}

function Password_match()
{
    var password_get=$("#current_password").val();
    var confiram_password_get=$("#confiram_password").val();
    if(password_get==confiram_password_get)
    {
        $("#confiram_password_block").html("<font color='green'>password Match</font>");
        $("#edit_submit_button").attr('disabled',false);
    }
    else
    {
        $("#confiram_password_block").html("<font color='red'>password Not Match</font>");
        $("#edit_submit_button").attr('disabled',true);
    }
}


$(document).ready(function()
{
    $("#password_show_button").mouseup(function()
    {
        $("#current_password").attr("type", "password");
    });
    $("#password_show_button").mousedown(function(){
        $("#current_password").attr("type", "text");
    });
});


$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/create_admin_pdf_report');

        w.onload = function()
        {
            w.print();
        };

    });
});