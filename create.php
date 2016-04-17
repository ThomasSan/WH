<?PHP
if ($_POST[submit] === OK)
{
if(!file_exists("./private"))
{
	mkdir("./private/");
}
if(file_exists("./private/passwd"))
{
	$file = file_get_contents("./private/passwd");
	$array = unserialize($file);
	foreach($array as $key);
	{
		if ($key[login] === $_POST[login])
		{
			echo "ERROR\n";
			die ;
		}
	}
	$i = 0;
	while ($array[$i])
		$i++;
	$array[$i] = array("login" => $_POST[login], "passwd" => hash(whirlpool, $_POST[passwd]));
	file_put_contents("./private/passwd", serialize($array));
}
else
	file_put_contents('./private/passwd', serialize(array(array("login" => $_POST[login], "passwd" => hash(whirlpool, $_POST[passwd])))), FILE_APPEND);
echo "OK\n";
header("Location: index.html");
}
else
echo "ERROR\n";
?>
