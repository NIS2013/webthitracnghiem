<div class="container">
  <div class="user-form">
    <form class="form-signin" action="<?php echo $GLOBALS['ep_dynamic_url']; ?>admin" method="post">
      <center><h2 class="form-signin-heading">AdminCP</h2></center>
      <label for="inputEmail" class="sr-only"> </label>
      <input type="text" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only"> </label>
      <input type="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox">
        <input type="checkbox" id="remember" />
        <label for="remember">Nhớ mật khẩu</label>
      </div>
      
      <!-- <input id="remember2" type="hidden" name="remember"/> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
    </form>
  </div>
</div>
<script type="text/javascript">
  function validate() {
    if (document.getElementById('remember').checked) {
      $('#remember').attr('name', '');
    } else {
      $('#remember').attr('name', 'remember');
    }
  }
</script>