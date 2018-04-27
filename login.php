<?php
	session_start();
				
  require 'connection.php';
if(!$con)
{
	echo 'Cannot connect to database';
}
else
{
		
	if(isset($_POST['save']))
	{ 
						
			$txtuser=$_POST['username'];
			$txtpass=$_POST['password'];
			$_SESSION['login_user']=$txtuser;
			$query="SELECT * FROM register WHERE username='$txtuser' AND password='$txtpass'";
			$query1=mysqli_query($con,$query);
			
			$rows1=mysqli_num_rows($query1);
			if($rows1>=1){
				
			header("Location:trip.php");
			}
			else
			{
				
				
			$loginuser='Username or password is invalid';
			}

			
	}
	if(isset($_POST['register']))
	{
		$a=$_POST['reg_name'];
		$b=$_POST['reg_user'];
		$c=$_POST['reg_pass'];
		$d=$_POST['reg_mail'];
		$e=$_POST['reg_contact'];
		$f=$_POST['reg_locality'];
		$query2 = "SELECT username FROM register WHERE username='".$b."'";
		$query3 = mysqli_query($con,$query2);
		$rows2=mysqli_num_rows($query3);
		if($rows2>=1){
			$registeruser='This user name already exists. Please enter a new username.';
		}
		else{
		$sql="insert into register(name,username,password,email_id,contact_no,locality) values('$a','$b','$c','$d','$e','$f')";
		
		mysqli_query($con,$sql);
		}
	}
}
	?>
<html>

<style>

body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}

.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}





</style>
<head>
<link rel="stylesheet" href="style.css">
</head>

<div class="login-wrap">

	<div class="login-html">
	<form action="login.php" method="post">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					Username :
					<input type="text" class="label" name="username" id="username" placeholder="Username"  required />
	  
				</div>
				<div class="group">
					Password :
						<input type="password" class="label" id="password" name="password" placeholder="Password" />

				</div>
				
				<div class="group">
					<input type="submit" class="button" name="save" id="save" value="Login"></input>  
				</div>
				<div class="group">
					<?php $loginuser=''; ?>
					<p><?php echo $loginuser; ?></p>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-2">New User? SignUp!</a>
				</div>
			</div>
			</form>
			<form action="login.php" method="post"> 
			<div class="sign-up-htm">
				<div class="group">
					Enter your Name :<input type="text" class="label" name="reg_name" placeholder="" required  />	  				
				</div>
				<div class="group">
					Enter your Username :<input type="text" class="label" name="reg_user" placeholder="" required />
   				</div>
				<div class="group">
					Enter Password :<input type="password" class="label" name="reg_pass" placeholder="" required />
				</div>
				<div class="group">
					Enter Email ID :<input type="email" class="label" name="reg_mail" placeholder="eg : abc@yahoo.com" required />
				</div>
				<div class="group">
					Enter Contact Number :<input type="text" class="label" name="reg_contact" placeholder="" required />
	 
	 
				</div>
				<div class="group">
					Enter your Locality :<input type="text" class="label" name="reg_locality" placeholder="" required />     				
				</div>
				<div class="group">
					<input type="submit" class="button" name="register" id="register" value="Register"></input>
				</div>
				<div class="group">
					<?php $registeruser=''; ?>
					<p><?php echo $registeruser; ?></p>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
			
			</form>
			
		</div>
	</div>
</div>
</body>
</html>

