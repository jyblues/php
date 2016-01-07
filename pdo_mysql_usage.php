$host = "localhost";
$dbname = "sample_table";
$username = "test";
$password = "1234";

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function getData($db,$sql) {
   $stmt = $db->query($sql);
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//then much later
try {
   $user = getData($db, "select * from user where UID=1");
   var_dump($user);
} catch(PDOException $ex) {
   echo "An Error occured!"; //user friendly message
    some_logging_function($ex->getMessage());
}
