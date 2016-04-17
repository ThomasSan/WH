<script langage="javascript">top.frames['chat'].location = 'chat.php'; </script>
<?PHP
session_start();
date_default_timezone_set('Europe/Paris');
if ($_SESSION[loggued_on_user] !== "" && $_POST[submit] === OK)
{
	if (!file_exists("./private/chat"))
		file_put_contents("./private/chat", serialize(array(array("login" => $_SESSION[loggued_on_user], "time" => time(), "msg" => $_POST[msg]))));
	else
	{
		$file = fopen("./private/chat", "r+");
		if (flock($file, LOCK_EX))
		{
			$tmp = file_get_contents("./private/chat");
			$array = unserialize($tmp);
			$i = 0;
			while ($array[$i])
				$i++;
			$array[$i] = array("login" => $_SESSION[loggued_on_user], "time" => time(), "msg" => $_POST[msg]);
			file_put_contents("./private/chat", serialize($array));
			flock($file, LOCK_UN);
		}
		else
			echo "can;t lock it\n";
		fclose($file);
	}
}
else if ($_SESSION[loggued_on_user] === "")
{
	echo "ERROR\n";
	die ;
}
?>
<!DOCTYPE HTML>
<html>
<body>
<form action="speak.php" method="POST">
<input type="text" name="msg" value="">
<input type="submit" name="submit" value="OK">
</body>
</html>
