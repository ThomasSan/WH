<?PHP
if($_POST[submit] === OK)
{
	if ($_POST[newpw] === "")
	{
		echo "newpw vide ERROR\n";
		die ;
	}
	$ash = hash(whirlpool, $_POST[oldpw]);
	$flag = 0;
	if (file_exists("./private/passwd"))
	{
		$content = file_get_contents("./private/passwd");
		$tmp = unserialize($content);
		$i = 0;
		foreach ($tmp as $array)
		{
			if ($array[login] === $_POST[login] && $array[passwd] === $ash)
			{
				echo "OK\n";
				$replace = $i;
				$success = true;
			}
			$i++;
		}
		if ($success === true)
		{
			$tmp[$replace] = array("login" => $_POST[login], "passwd" => hash(whirlpool, $_POST[newpw]));
			file_put_contents("./private/passwd", serialize($tmp));
			header("Location: index.html");
		}
		else
			echo "ERROR\n";
	}
}
else
echo "ERROR\n"
?>
