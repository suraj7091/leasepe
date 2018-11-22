<script type="text/javascript">
    function valid()
    {
      
        var h=document.forms["reg2"]["forgot"].value;
        if(h.length<10)
        {
            alert("Invalid phone number");
            return false;
        }


}
  function refreshCaptcha()
{
    document.getElementById("refresh").innerHTML="<img src='captcha.php' id='captchaimg' style='width:90%;'>click <a href='javascript: refreshCaptcha();'>here</a> to refresh.";
}
var x;
$(document).ready(function () {
    $('#tags').on('autocompletechange change', function () {
        //$('#tagsname').html('You selected: ' + this.value);
         x=this.value;
         alert(x);
    }).change();
});

function getdata()
{
    alert(x);
if(x!='')
{
  alert(x);
return false;
}
}
// 
</script>
     