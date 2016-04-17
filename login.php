<?PHP
include("auth.php");
session_start();
if (auth($_POST[login], $_POST[passwd]))
{
	echo "OK\n";
	$_SESSION[loggued_on_user] = $_POST[login];
	echo "<br /><iframe name ='chat' src='chat.php' width=100% height='550px'></iframe>";
	echo "<br /><iframe name ='speak' src='speak.php' width=100% height='50px'></iframe>";
}
else
{
	echo "ERROR\n";
	$_SESSION[loggued_on_user] = "";
}
?>
