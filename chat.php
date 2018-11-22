<?php
	session_start();
	include('connection.php');
	$row1[0]='spiderman';
	if(isset($_SESSION['SESS_FIRST_NAME'])){


	$id=$_SESSION['SESS_FIRST_NAME'];
		$result=mysqli_query($bd,"SELECT * FROM member WHERE phonenumber='$id'");
		$row1= mysqli_fetch_array($result);
		
	}

	?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">

		function reply( parent)
		{
			
			document.getElementById(parent).style.display="block";
	}

	function commentSubmit2(parent){
		//var a=document.getElementById(parent).comments.value;

		var p='<?php if(isset($_SESSION['SESS_FIRST_NAME'])){echo"1";}else{echo "0";}?>'
		if(p==1){
			var a=document.getElementById(parent).value;
			
			if(a=='')
			{
				alert("enter some message");
				return;
			}
		
			var name="<?php echo $row1[0];?>";

			var userid="<?php echo $row1[1];?>";
			var adid="<?php echo $_GET['id'];?>"
			var comments = a;
			var xmlhttp = new XMLHttpRequest(); 
			
			xmlhttp.onreadystatechange = function(){ 
				if(xmlhttp.readyState==4&&xmlhttp.status==200){
					document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; 
				}
			}
				xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&parent='+parent+'&userid='+userid+'&id='+adid, true); 
			xmlhttp.send();}
			else
			{
				alert("please login to comment");
				return;
			}
		}

		function commentSubmit(){
			
			if(form1.comments.value == ''){ 
				alert('Enter your message !');
				return;
			}
			var p='<?php if(isset($_SESSION['SESS_FIRST_NAME'])){echo"1";}else{echo "0";}?>'
			if(p==1)
			{
	             var parent=-1;
	             var name="<?php echo$row1[0];?>";
	             var userid="<?php echo$row1[1];?>";
	             var adid="<?php echo $_GET['id'];?>"
	             
			var comments = form1.comments.value;
			var xmlhttp = new XMLHttpRequest(); 
			
			xmlhttp.onreadystatechange = function(){ 
				if(xmlhttp.readyState==4&&xmlhttp.status==200){
					document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; 
				}
			}
			xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&parent='+parent+'&userid='+userid+'&id='+adid, true); 
			xmlhttp.send();
			}
			else
			{
				alert("please login to comment");
				return;
			}
			
			
		}
		
			
	</script>