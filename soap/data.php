
<?php
require '../config/callOOPdbcon.php';
$conn=mysqli_connect("localhost", 'root', '', 'loa_music_website');

    function get_userEmail($userID){
        $conn=mysqli_connect("localhost", 'root', '', 'loa_music_website');
        
        $sql = "SELECT * FROM users";
        $result=mysqli_query($conn, $sql);
        $counter = mysqli_num_rows($result);
        $email=1;
        for($i=0; $i<$counter; $i++){
            $row = mysqli_fetch_array($result);
            if($row['id'] == $userID){
                $email = $row['email'];
                break;
            }
        }return $email;
    }
?>

<!--
$row = executeQuery($dbc,$query,true);

$row = mysqli_fetch_array($result);

for($i=0; $i<$counter; $i++){
	$row = mysqli_fetch_array($result);
}

$counter = mysqli_num_rows($result);


        foreach($result as $users){
            if($users['id'] == $userID){
                return $users['email'];
                break;
            }
        }
-->