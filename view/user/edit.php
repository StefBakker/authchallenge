<div class="container">
	<h1>Bewerk student</h1>
	<form action="<?= URL ?>user/editSave" method="post">

		<input type="text" name="name" value="<?= $user['name']; ?>">
		<input type="password" name="password" value="<?= $user['password']; ?>">

		<input type="hidden" name="id" value="<?= $user['id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form>

</div>
