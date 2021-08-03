<?php 
include ROOT.'/layouts/header.php';
?>

<div class="d-flex justify-content-center p-5 flex-column">

	<? if (isset($_POST['onSubmit'])):?>
		<? if(!empty($errors)): echo str_replace('#', $errors[0], $htmlError); ?>
		<? else:echo str_replace('#', 'User register!', $htmlSuccessful); ?>
		<? endif;?>
	<? endif;?>

	<form method="POST" action="<?php ROOT.'/views/register/index.php';?>">
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="Name">Name</label>
	      <input type="text" name="name" class="form-control" id="Name" placeholder="Name">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputPassword4">Password</label>
	      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
	    </div>
	    <div class="form-group col-md-4">
	      <input type="password" name="r_password" class="form-control" id="inputPassword5" placeholder="Repeat password">
	    </div>
	  </div>
	  <div class="form-group col-md-4">
	    <label for="inputEmail4">Email</label>
	    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputState">Who you are?</label>
	      <select name="whoIs" id="inputState" class="form-control">
	        <option selected></option>
	        <option value="Bitmaker">Bitmaker</option>
	        <option value="Artist">Artist</option>
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="form-check">
	      <label class="form-check-label">
	        <input name="checkRule" class="form-check-input" type="checkbox">I accept the terms of the agreement
	      </label>
	    </div>
	  </div>
	  <button type="submit" name="onSubmit" class="btn btn-danger">Sign in</button>
	</form>
</div>



<?php 
include ROOT.'/layouts/footer.php';
?>