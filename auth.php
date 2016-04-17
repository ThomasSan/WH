<?PHP
function auth($login, $passwd)
{
	if(file_exists('./private/passwd'))
	{
		$ash = hash(whirlpool, $passwd);
		$tmp = unserialize(file_get_contents('./private/passwd'));
		foreach ($tmp as $array)
		{
			if ($array[login] === $login && $array[passwd] === $ash)
				return true;
		}
	}
	return false;
}
?>
