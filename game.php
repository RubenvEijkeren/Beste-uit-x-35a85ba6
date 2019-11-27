<h1>Steen Papier Schaar</h1>
<h2>Speler 1: </h2>
<?php
if (!isset($_GET['een'])) {
?>
<form method="GET">
	<select name="een">
		<option value="steen">Steen</option>
		<option value="papier">Papier</option>
		<option value="schaar">Schaar</option>
	</select>
</form>
<?php
} else {
?>
<p><?php echo $_GET['een']; ?></p>
<?php
}
?>
<br /><br />
<h2>Speler 2: </h2>
<?php
if (isset($_GET['een'])) {
if (!isset($_GET['twee'])) {
?>
<form method="GET">
	<select name="twee">
		<option value="steen">Steen</option>
		<option value="papier">Papier</option>
		<option value="schaar">Schaar</option>
	</select>
	<input type="hidden" name="een" value="<?php echo $_GET['een'] ?>"
</form>
<?php
} else {
?>
<p><?php echo $_GET['twee']; ?></p>
<?php
}
}
?>
<br /><br /><br />
<?php
$a = $_GET['een'];
$b = $_GET['twee'];
if ($a == "steen") {
	if ($b == "steen") {
		echo "<h1>Het staat gelijk</h1>";
	} elseif ($b == "papier") {
		echo "<h1>Speler 2 wint!</h1>";
	} elseif ($b == "schaar") {
		echo "<h1>Speler 1 wint!</h1>";
	}
} elseif ($a == "papier") {
	if ($b == "steen") {
		echo "<h1>Speler 1 wint!</h1>";
	} elseif ($b == "papier") {
		echo "<h1>Het staat gelijk</h1>";
	} elseif ($b == "schaar") {
		echo "<h1>Speler 2 wint!</h1>";
	}
} elseif ($a == "schaar") {
	if ($b == "steen") {
		echo "<h1>Speler 2 wint!</h1>";
	} elseif ($b == "papier") {
		echo "<h1>Speler 1 wint!</h1>";
	} elseif ($b == "schaar") {
		echo "<h1>Het staat gelijk</h1>";
	}
}
?>