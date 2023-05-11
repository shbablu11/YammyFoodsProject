<?php
session_start();
include "./inc/login_header.php"

?>

<form action="./controller/loginUser.php" method="POST" class="login100-form ">
<span class="login100-form-title">
Member Login
</span>
<div class="wrap-input100" data-validate="Valid email is required: ex@abc.xyz">
<input value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>" class="input100" type="text" name="email" placeholder="Email">

<?php
if(isset($_SESSION['email_error'])){
    ?>
    <span><?= $_SESSION['email_error']?></span>
    <?php
}
?>

<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-envelope" aria-hidden="true"></i>
</span>
</div>
<div class="wrap-input100" data-validate="Password is required">
<input value="<?= isset($_SESSION['old']['pass']) ? $_SESSION['old']['pass'] : '' ?>" class="input100" type="password" name="pass" placeholder="Password">

<?php
if(isset($_SESSION['pass_error'])){
    ?>
    <span><?= $_SESSION['pass_error']?></span>
    <?php
}
?>

<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock" aria-hidden="true"></i>
</span>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn">
Login
</button>
</div>
<div class="text-center p-t-12">
<span class="txt1">
Forgot
</span>
<a class="txt2" href="#">
Username / Password?
</a>
</div>
<div class="text-center p-t-135">
<a class="txt2" href="./register.php">
Create your Account
<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
</a>
</div>
</form>
</div>
</div>
</div>

<?php
session_unset();
include "./inc/login_footer.php"

?>