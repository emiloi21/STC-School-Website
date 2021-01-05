<script type="text/javascript">
function checkMailStatus(){
    //alert("came");
var email=$("#email").val();// value in field email
$.ajax({
    type:'post',
        url:'checkMail.php',// put your real file name 
        data:{email: email},
        success:function(msg){
        alert(msg); // your message will come here.     
        }
 });
}

</script>

  <p>Email<input type="text" name="email" id="email" onblur="checkMailStatus()" size="18" maxlength="50" required="" /></p>