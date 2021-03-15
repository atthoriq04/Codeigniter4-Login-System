<!-- Optional JavaScript; choose one of the two! -->

<?php
$success = session()->getFlashdata('Success');
if (!empty($success)) { ?>
	<div class="alert alert-success" role="alert">
		Login Successs! Welcome!
	</div>
<?php }
?>
<div class="row">
	<div class="col-sm">
		<h1 class="text-center"> -Dashboard- </h1>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm">
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row g-0">
				<div class="col-md-10">
					<div class="card-body">
						<h5 class="card-title">Informasi User</h5>
						<p class="card-text">Username : <?= $Username; ?></p>
						<p class="card-text">User Role : <?= $Rolename; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm">

	</div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>