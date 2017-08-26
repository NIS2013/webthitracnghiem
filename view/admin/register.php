<style type="text/css">
.user-form input, .user-form label{
	border-color: #01579b !important;;
	color: #01579b !important;
}
</style>

<!--<h1 style="float: left; width: 100%;padding: 0 25px;"> Đăng kí </h1>-->

<?php 
if(!empty($errors)) {
	foreach($errors as $message) {
		echo "<span class='error'>".$message[0]."</span><br/>"; 
	}
}
if (!empty($result)) {
	if($result == 1) {
		echo "<span class='success'> Đăng kí thành công! </span> <a href='".$GLOBALS['ep_dynamic_url']."dashboard'> Go Back </a>";
	}
}

?>
<br/>
<div class="user-form" style="float: left; width: 100%;"> 
	<div class="row">
		<form action="<?php echo $GLOBALS['ep_dynamic_url']; ?>register" method="post" class="col s12">
		  <div class="row">
		  	<div class="input-field col s12">
			  <input id="email" name="email" type="text" class="validate" value="<?php if(isset($_POST['email'])) { echo $post['email']; } ?>">
			  <label for="email">Email(*)</label>
			</div>
			<div class="input-field col s12">
			  <input  id="username" name="username" type="text" class="validate" value="<?php if(isset($_POST['username'])) { echo $post['username']; } ?>">
			  <label for="username">MSSV(*)</label>
			</div>
			<div class="input-field col s12">
			  <input  id="username" name="password" type="password" class="validate" value="">
			  <label for="username">Mật khẩu(*)</label>
			</div>
			<div class="input-field col s12">
			  <input  id="username" name="passwordverify" type="password" class="validate" value="">
			  <label for="username">Xác nhận mật khẩu(*)</label>
			</div>
			<div class="input-field col s12">
			  <input id="name" name="name" type="text" class="validate" value="<?php if(isset($_POST['name'])) { echo $post['name']; } ?>">
			  <label for="name">Họ và tên</label>
			</div>	  			
		  
			<div class="input-field col s12">
			  <input id="location" name="location" type="text" class="validate" value="<?php if(isset($_POST['location'])) { echo $post['location']; } ?>">
			  <label for="location">Lớp</label>
			</div>
			<div id=captcha>
		   		<div style="float: left;"> <?php require "../captcha/captcha.php";?> </div>
		   		<a href=""><img style="padding-top: 15px;padding-left: 15px; height: 64px;width: auto;" src="https://ilab.vn/webthitracnghiem/view/images/refresh.png"> </a>
		   </div>
			<div class="input-field col s12">
			  <input id="location" name="captcha" type="text" class="validate" value="<?php if(isset($_POST['location'])) { echo $post['location']; } ?>">
			  <label for="location">Captcha(*)</label>
			</div>

			<div class="input-field col s12">
				<select name="gender" class="browser-default" >
				  <option value="" disabled selected>Giớ tính</option>
				  <option value="Male">Nam</option>
				  <option value="Female">Nữ</option>
				</select>
				
			</div>

			<div class="input-field col s12">
				<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">Đăng kí
					<i class="material-icons right">send</i>
				</button>
			</div>
		  </div>
		</form>
</div>

<a href='<?php echo $GLOBALS['ep_dynamic_url']; ?>'> Go Back </a>
