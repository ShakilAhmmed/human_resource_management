function password_len_check()
{
    var password_length_for_password=$("#password").val().length;

    if(password_length_for_password < 8)
    {
        $("#help_block").html("<font color='red'>password weak</font>");
    }
    else
    {
        $("#help_block").html("<font color='green'>password strong</font>");
    }

}

$(document).ready(function(){

    $("#password_show_button").mouseup(function(){

        $("#password").attr("type", "password");
    });
    $("#password_show_button").mousedown(function(){
        $("#password").attr("type", "text");

    });
});


function Password_match()
{
    var password_get=$("#password").val();
    var confiram_password_get=$("#password_confirm").val();
    if(password_get==confiram_password_get)
    {
        $("#password_match").html("<font color='green'>password Match</font>");
        $("#submit_button").attr('disabled',false);
    }
    else
    {
        $("#password_match").html("<font color='red'>password Not Match</font>");
        $("#submit_button").attr('disabled',true);
    }
}


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