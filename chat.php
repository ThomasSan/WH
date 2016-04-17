<?PHP
if (file_exists("./private/chat"))
{
	$file = file_get_contents("./private/chat");
	$tmp = unserialize($file);
	foreach($tmp as $msg)
	{
		echo "[" . $msg['time'] . "] ";
		echo "<b>" . $msg['login'] . "</b>:";
		echo " " . $msg['msg'] . "<br />";
	}
}
?>
