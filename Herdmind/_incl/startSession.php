<!-- starting session... -->
<?php
/*

Starts the session, gets the subdomain
Initializes stuff.

*/

session_start();

global $forumprefix;
global $ipid; //for guests
global $userid;
global $userName;
global $db_connection;
global $fandom;
global $parsedfandom;

 $fandom = "";
 $parsedfandom = "";

try{

		if (isset($_GET['fandom']))
			$fandom = htmlentities($_GET['fandom']);


$fandom = mysqli_fetch_array(
			mysqli_query($db_connection,
				"SELECT `BranchID`, `ParentBranchID`, `BranchName`, `Level`
					FROM `Branch` WHERE BranchID='".
					mysqli_real_escape_string($db_connection, $fandom)
					."'") );
$fandom = new Fandom($fandom[0],$fandom[1],$fandom[2],$fandom[3]);
	//Fetch the returned values, if any.
//	echo" Fetching global array \$fandom: "; var_dump($fandom);
//	echo $fandom[0];


} catch(Exception $e)
{
$fandom = $parsedFandom = "";
}

/*
// echo "
// \$fandom == $fandom";

if($fandom == 'beta')
{
	// echo "
	// \$fandom is beta. Defaulting to URL parameter...";
	$fandom = $_GET['fandom'];
	// echo "
	// \$fandom is now $fandom";
}
// echo "
// Parsing fandom name...";
switch(strtolower($fandom)) // Support for synonymous subdomains
{
	case null:
	case false:
	case '':
	case 'www':
		$fandom = null;
		$parsedFandom = null;
		break;
	case 'pony':
	case 'mlp':
	case 'fim':
		$fandom = 'pony';
		$parsedFandom = 'My Little Pony: Friendship is Magic';
		break;
	case 'tardis':
	case 'who':
	case 'dw':
		$fandom = 'tardis';
		$parsedFandom = 'Doctor Who';
		break;
	case 'ppg':
		$parsedFandom = 'Powerpuff Girls';
		break;
	case 'avatar':
		$parsedFandom = 'Avatar';
		break;
	case 'trek':
		$parsedFandom = 'Star Trek';
		break;
	default:
		 echo '
		 Fandom not registered. Nullifying...';
		$parsedFandom = $fandom;
		$fandom = null;
}*/

// echo "
// Fandom is $fandom ($parsedFandom)";

include $_SERVER['DOCUMENT_ROOT'] . '/_incl/config.php';

$login = false;

/*
require_once $_SERVER['DOCUMENT_ROOT'] . '/forum/APIs/smf_2_api.php';
global $user;
$user = smfapi_getUserByUsername($user_info['username']);
//echo $user['id_member'];
$uid = $user['id_member'];
$uname = $user['member_name'];
if ($uid != '')
{
$login = true;
}
*/

// echo '
// checking login...';
echo '
<!--';
if (isset($_POST['user']) && !$login)
{
	
	echo "
	Attempting login...";
	$loginname = htmlentities($_POST['user'], ENT_QUOTES);
	// echo "
	// " . $loginname . " is trying to log in with the password ";

	$saltarr = mysqli_fetch_array(
			mysqli_query($db_connection, "select Salt from User where Username = '$loginname'" ) );
	$salt = $saltarr[0];

	//Same here, but with "password".
	$password = $_POST['password'];
	// echo $password;

	//Hash the password such that it's symmetrical with SMF's hashing method.
	$hash = sha1($password . strtolower($loginname));
	
	
	$options = array(
    'cost' => 11,
    'salt' => $salt
	);
	$hash = password_hash("$password", PASSWORD_BCRYPT, $options)."\n";
	// echo "
	// password now hashed as " . $hash;
	
	//Query the database and select the password based on the supplied loginname.
	$qstring = 'SELECT Password, UserID, UserName
				FROM User WHERE UserName=\'' . $loginname . '\'';
	$query = mysqli_query($db_connection, $qstring);
	
	echo "
	Connected to database using this query:
		";
	var_dump($qstring);
	echo "
	Checking password...";
	
	//Fetch the returned values, if any.
	$attemptCount = 0;
	$entry = mysqli_fetch_array($query);
	echo "
	Fetching array:";
	var_dump($entry);
	while($entry)
	{
		echo "
		Attempt " . ++$attemptCount;
		echo "
		checking " . $hash . " against " . $entry['Password'] . "...";
		if ($entry['Password'] == $hash)
		{
			// echo '
			// Login successful!';
			$login = true;
			
			// store session data
			$_SESSION['userid']= $entry['UserID'];
			$_SESSION['username']= $entry['UserName'];

			break;
		}
		$entry = mysqli_fetch_array($query);
		echo "
		Fetching array:";
		var_dump($entry);
	}
	echo "
	Login " . ($login ? "successful" : "failed") . "!";
}
if ($_POST['logout'] == 'yesplease') // If the user is logging out
{
	session_start();
	session_destroy();
}
echo '
-->';
// else
// {
	// echo "
// User is not logging in";
// }

// echo "
// " . ($loginname ? $loginname : "User") . " is " . ($login ? "currently" : "not") . " logged in.";

echo '<!--';
if(isset($_SESSION['userid']))
{
	$userid = $_SESSION['userid'];
	$userName = $_SESSION['username'];
	echo "userid = $userid , username = $userName\r\n";
}
else
{
	echo "Session userid is not set";
}
echo '-->';
			/////Get the IP address ID of the user.

			$ipaddress = $_SERVER["REMOTE_ADDR"];

			$findip = "select id from IPaddresses where IP = '".$ipaddress."'";
			$ipid = '';
			
// echo $findip;
			$run = mysqli_query($db_connection, $findip) or die(":( ".mysqli_error($db_connection));

//echo "<br/>1 ".$findip."<br/>";
			while ($line = mysqli_fetch_array($run, MYSQL_ASSOC)) {
				$opta = array();
				$pos = 0;
				foreach ($line as $col_value) {
				
					$opta[$pos] = "$col_value";
					$pos++;
				}	
				$ipid = $opta[0];
			} 

			//If this is a NEW IP address, give it an ID. 
			if($ipid == "")
			{
			$run = mysqli_query($db_connection, "INSERT INTO IPaddresses (IP, lastvisit)
			VALUES ('".$ipaddress."', NOW( ) )");
			$ipid = mysqli_insert_id($db_connection);
			}

?>
<!-- session started -->
