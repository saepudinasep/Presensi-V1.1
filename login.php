<!-- =========================================================== -->
<!-- FORM LOGIN -->
<!-- =========================================================== -->
<h4>Silahkan Login memakai NIM / username:</h4>

<?=$pesan_login ?>
<div class="row">
	<div class="col-lg-4">
		<form method="post">
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="password">
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-block">Login</button>
			</div>
		</form>
	</div>
</div>
