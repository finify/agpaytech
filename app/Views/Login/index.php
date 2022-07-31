<?php $this->start('head');?>
<meta content="test">
<?php $this->end();?>

<?php $this->start('body');?>
<form id="loginform" class="login col s12" METHOD="POST">
	
		<h3><p class="title">Admin Log in</p></h3>
		<br/>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Email" id="user" required name="Email" type="Email" class="validate">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input placeholder="Password" id="userpass" required name="userpassword" type="password" class="validate">
			</div>
		</div>
		<input type="submit" id="button" value="Login"/>
	</form>

<?php $this->end();?>