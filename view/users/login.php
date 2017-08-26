<style type="text/css">
	.user-form input, .user-form label{
		border-color: #01579b !important;;
		color: #01579b !important;
	}
</style>
<!--
<center>
<h1 style="float: left; width: 100%;padding: 0 25px;"> ilab.vn </h1> <br/>
<h5> Fill your full infomations to start!  </h5>
</center>
-->
<?php
$token = new Csrf(true, true, false);

if(!empty($errors)) {
	foreach($errors as $message) {
		echo "<span class='error'>".$message[0]."</span><br/>"; 
	}
}
?>
<br/>
<div class="container">
	<div class="user-form" style="float: left; width: 100%;"> 
		<div class="row">
			<form action="<?php echo $token->create_link($GLOBALS['ep_dynamic_url'].'login') ?>" method="post" class="col s12">
				<div class="row">  			

					<div class="input-field col s12">
						<input autocomplete="off" id="email" name="email" type="text" class="validate" value='<?php //if(isset($_POST['email'])) { echo $post['email']; } ?>'>
						<label for="email">Tài khoản</label>
					</div>
					<div class="input-field col s12">
						<input  id="username" name="password" type="password" class="validate" value="" autocomplete="off">
						<label for="username">Mật khẩu</label>
					</div>
					<!-- Captcha is here ! -->
					<div id=captcha>
						<!-- include captcha -->
						<div style="float: left;"> <?php require "captcha/captcha.php";?> </div>
						
						<div id="refresh" onmouseout="refresh()">
							<a href=""><img id="reimg" style="padding-top: 15px;padding-left: 15px; height: 64px;width: auto;" src="<?php echo $GLOBALS['ep_base_url'];?>view/images/refresh.png"> </a>
						</div>
					</div>

					<!-- Captcha is here ! -->
					<div class="input-field col s12">
						<input autocomplete="off" id="captcha" name="captcha" type="text" class="validate" value='<?php if(isset($_POST['captcha'])) { echo $post['captcha']; } ?>'>
						<label for="captcha">Captcha</label>
					</div>

					<div class="input-field col s12">
						<input id="remember" name="remember" type="checkbox" onclick="validate()" value="0">
						<label for="remember">Lưu mật khẩu</label>
					</div>
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light light-blue darken-4" type="submit" onclick="checkData()" style="margin-top: 20px;">Đăng nhập
							<i class="material-icons right">send</i>
						</button>
					</div>
					<div id="div1">
						
					</div>
					<div class="input-field col s12">
						<a href='<?php echo $GLOBALS['ep_dynamic_url'];?>register'> Đăng kí </a> | <a href='<?php echo $GLOBALS['ep_dynamic_url']; ?>login/forgot'> Quên mật khẩu </a>
					</div>
				</div>
				<input id="remember2" type="hidden" name="remember"/>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	//check data input
	function checkData(){
		var username = document.getElementById("username");
		//var password = document.getElementById("password");
		var captcha  = document.getElementById("captcha");

		var letters = /[0-9a-zA-Z]+/; //regex
		//var letters = /[^a-z_\-0-9]/i;
		if(!username.value.match(letters)){
			alert("Dữ liệu không hợp lệ!...");
			//username.value = '';
			username.focus();
		}
		// if(!password.value.match(letters)){
		// 	alert("Dữ liệu không hợp lệ!...");
		// 	//username.value = '';
		// 	password.focus();
		// }
		if(!captcha.value.match(letters)){
			alert("Dữ liệu không hợp lệ!...");
			//username.value = '';
			captcha.focus();
		}
	}

	function validate() {
		if (document.getElementById('remember').checked) {
			$('#remember2').attr('name', '');
		} else {
			$('#remember2').attr('name', 'remember');
		}
	}
</script>
