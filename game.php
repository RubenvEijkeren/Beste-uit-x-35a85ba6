<?php
session_start();
if (isset($_GET["number"])) {
	$_SESSION["countmax"] = $_GET["number"];
	$_SESSION["gameinfo"] = array();
	header("Location: game.php");
}
elseif (!isset($_SESSION["countmax"]) && !isset($_SESSION["gameinfo"])){
	?>
	<h1>Hoeveel rondes moet je winnen?</h1>
	<form>
		<input type="number" name="number">
		<button type="submit">Start!</button>
	</form>
<?php }
elseif($_SESSION["countmax"] > count($_SESSION["gameinfo"])){
?>
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
	<input type="submit" name="submit">
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
	<input type="submit" name="submit">
	<input type="hidden" name="een" value="<?php echo $_GET['een'] ?>">
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
if (isset($_GET["twee"])){
$a = $_GET['een'];
$b = $_GET['twee'];
if ($a == "steen") {
	if ($b == "steen") {
		echo "<h1>Het staat gelijk</h1>";
		array_push($_SESSION["gameinfo"], "gelijk");
	} elseif ($b == "papier") {
		echo "<h1>Speler 2 wint!</h1>";
		array_push($_SESSION["gameinfo"], "2");
	} elseif ($b == "schaar") {
		echo "<h1>Speler 1 wint!</h1>";
		array_push($_SESSION["gameinfo"], "1");
	}
} elseif ($a == "papier") {
	if ($b == "steen") {
		echo "<h1>Speler 1 wint!</h1>";
		array_push($_SESSION["gameinfo"], "1");
	} elseif ($b == "papier") {
		echo "<h1>Het staat gelijk</h1>";
		array_push($_SESSION["gameinfo"], "gelijk");
	} elseif ($b == "schaar") {
		echo "<h1>Speler 2 wint!</h1>";
		array_push($_SESSION["gameinfo"], "2");
	}
} elseif ($a == "schaar") {
	if ($b == "steen") {
		echo "<h1>Speler 2 wint!</h1>";
		array_push($_SESSION["gameinfo"], "2");
	} elseif ($b == "papier") {
		echo "<h1>Speler 1 wint!</h1>";
		array_push($_SESSION["gameinfo"], "1");
	} elseif ($b == "schaar") {
		echo "<h1>Het staat gelijk</h1>";
		array_push($_SESSION["gameinfo"], "gelijk");
	}
}
header("Location: game.php");
}
}
else {
	$p1 = 0;
	$p2 = 0;
	foreach ($_SESSION["gameinfo"] as $value) {
		if ($value == "gelijk"){
			$p1++;
			$p2++;
		}
		elseif ($value == "1") {
			$p1++;
		}
		elseif ($value == "2") {
			$p2++;
		}
	}
	if ($p1 == $p2){
		$_SESSION["countmax"]++;
		header("Location: game.php");
	}
	elseif ($p1 > $p2) {
		echo "Player 1 won!";
	}
	elseif ($p1 < $p2) {
		echo "Player 2 won!";
	}
}
?>