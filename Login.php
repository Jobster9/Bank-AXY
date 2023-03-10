<?php
$loginerror = ""; //Change to tell the user when login attempt is invalid
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	

			<div class="login">
				<form>
					<label aria-hidden="true">Log In Page</label>
					<input class="input" type="text" name="txt" placeholder="User name" required="">
					<input class="input" type="password" name="pswd" placeholder="Password" required="">
                    <span class="text-danger"><?php echo $loginerror; ?></span>
					<input class="button" type="submit" value="Log In" name="submit"></input>
				</form>
			</div>

	</div>
</body>
</html>

<style>

body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
}
.main{
	width: 750px;
	height: 500px;
	background: #F2B705;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
.login{
	position: relative;
	width:100%;
	height: 100%;
}
label{
	font-size: 40px;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
}
.input{
	width: 60%;
	height: 20px;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
span{
	width: 60%;
	height: 20px;
    justify-content: center;
	display: flex;
	margin: 20px auto;
    color: red;
}
.button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: black;
	font-size: 20px;
	font-weight: bold;
	margin-top: 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

.button:hover{
	background: lightgray;
}

.login label{
	color: black;
}