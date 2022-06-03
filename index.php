<?php
include "structure/header.php";
?>

	<form class="w-1/2 m-auto gap-x-5 flex justify-center mb-10" action = "<?php $_PHP_SELF ?>" method = "GET">
		<select name="name" class="rounded">
    		<option value="" disabled selected>Choose a Hero</option>
			<option value="" disabled>-- Marvel --</option>
			<option value="Ghost Rider">Ghost Rider</option>
			<option value="Carnage">Carnage</option>
			<option value="Iron Man">Iron Man</option>
			<option value="Daredevil">Daredevil</option>
			<option value="Deadpool">Deadpool</option>
			<option value="Hulk">Hulk</option>

			<option value="" disabled>-- DC --</option>

			<option value="Batman">Batman</option>
			<option value="Aquaman">Aquaman</option>
			<option value="Hellboy">Hellboy</option>
			<option value="Lobo">Lobo</option>
			<option value="Rorschach">Rorschach</option>
			<option value="Dr Manhattan">Dr Manhattan</option>
		</select>
		<button type="submit" class="border px-2 rounded bg-yellow-100">Submit</button>
    </form>

<?php

include "functions.php";

if (isset($_GET['name'])) {

	output_data($_GET['name'], "localhost", "root", "", "heroes_project");

}

?>

<?php
include "structure/footer.php";
?>