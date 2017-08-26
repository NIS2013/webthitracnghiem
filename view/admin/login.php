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
<!--<?php //echo  $_SERVER['REQUEST_URI']; ?>
</center>
-->
<?php 
if(!empty($errors)) {
	foreach($errors as $message) {
		echo "<span class='error'>".$message[0]."</span><br/>"; 
	}
}
?>
<br/>
<div class="user-form" style="float: left; width: 100%;"> 
	<div class="row">
		<form action="<?php echo $GLOBALS['ep_dynamic_url']; ?>login" method="post" class="col s12">
		  <div class="row">  			
		    
		    <div class="input-field col s12">
  			  <input autocomplete="off" id="email" name="email" type="text" class="validate" value='<?php if(isset($_POST['email'])) { echo $post['email']; } ?>'>
			  <label for="email">Email</label>
			</div>
			<div class="input-field col s12">
			  <input  id="username" name="password" type="password" class="validate" value="" autocomplete="off">
			  <label for="username">Mật khẩu</label>
			</div>

			<div class="input-field col s12">
			  <input  id="username" name="otp" type="text" class="validate" value="" autocomplete="off">
			  <label for="username">Mật khẩu OTP</label>
			</div>
			<!-- Captcha is here ! -->
		   <div id=captcha>
		   		<div style="float: left;"> <?php require "../captcha/captcha.php";?> </div>
		   		<a href=""><img style="padding-top: 15px;padding-left: 15px; height: 64px;width: auto;" src="https://ilab.vn/webthitracnghiem/view/images/refresh.png"> </a>
		   </div>
		   
		    <!-- Captcha is here ! -->
		    <div class="input-field col s12">
  			  <input autocomplete="off" id="email" name="captcha" type="text" class="validate" value='<?php if(isset($_POST['email'])) { echo $post['email']; } ?>'>
			  <label for="email">Captcha</label>
			</div>
			
			<div class="input-field col s12">
			  <input id="remember" name="remember" type="checkbox" onclick="validate()" value="0">
			  <label for="remember">Lưu mật khẩu</label>
			</div>
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">Đăng nhập
					<i class="material-icons right">send</i>
				</button>
			</div>
			<div class="input-field col s12">
			  <a href='<?php echo $GLOBALS['ep_dynamic_url']; ?>register'> Đăng kí </a> | <a href='<?php echo $GLOBALS['ep_dynamic_url']; ?>login/forgot'> Quên mật khẩu </a>
			</div>
		  </div>
		  <input id="remember2" type="hidden" name="remember"/>
		</form>
	</div>
</div>

<script type="text/javascript">
    function validate() {
        if (document.getElementById('remember').checked) {
            $('#remember2').attr('name', '');
        } else {
             $('#remember2').attr('name', 'remember');
        }
    }
</script>
