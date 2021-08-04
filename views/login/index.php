<?php 
include ROOT.'/layouts/header.php';
?>

<div class="d-flex justify-content-center p-5 flex-column">

	<? if (isset($_POST['onLogin'])):?>
		<? if(!empty($errors)): echo str_replace('#', $errors[0], $htmlError); ?>
		<? endif;?>
	<? endif;?>

	<form method="POST" action="<?php ROOT.'/views/login/index.php';?>">
	  <div class="form-group col-md-4">
	    <label for="inputEmail4">Email</label>
	    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputPassword4">Password</label>
	      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
	    </div>
	  </div>
	  <button type="submit" name="onLogin" class="btn btn-danger">Login</button>
	</form>
</div>



<?php 
include ROOT.'/layouts/footer.php';
?>