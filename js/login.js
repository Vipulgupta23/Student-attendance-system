
function tryLogin()
{
    let un=$("#txtUsername").val();
    let pw=$("#txtPassword").val();
    if(un.trim()!=="" && pw.trim()!="")
    {
       
       $.ajax({
        url:"ajaxhandler/loginAjax.php",
        type:"POST",
        dataType:"json",
        data:{user_name:un,password:pw,action:"verifyUser"},
        beforeSend:function(){
         
        },
        success:function(rv){
            
            if(rv['status']=="ALL OK")
            {
                document.location.replace("attendance.php");
            }
            else{
                alert(rv['status']);
            }
        },
        error:function(){
            
            alert("oops something went wrong");
        },
       });
    }
}
$(function(e){
    
    $(document).on("keyup","input",function(e){
        $("#diverror").removeClass("applyerrordiv");
        let un=$("#txtUsername").val();
        let pw=$("#txtPassword").val();
        if(un.trim()!=="" && pw.trim()!=="")
        {
          $("#btnLogin").removeClass("inactivecolor");
          $("#btnLogin").addClass("activecolor");
        }
        else{
            $("#btnLogin").removeClass("activecolor");
            $("#btnLogin").addClass("inactivecolor");
        }
    }); 
    $(document).on("click","#btnLogin",function(e){
        tryLogin();
    });
});