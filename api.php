<!-- Low Zhi Lok & Lee Kai Mun -->
<?php

$conn=mysqli_connect("localhost", 'root', '', 'loa_music_website');

$response = array();

if($conn){
	
	$sql = "SELECT * FROM songs";
	$result = mysqli_query($conn, $sql);

	if($result){
		header("Content-Type:application/json");
		$i=0;
		while($row = mysqli_fetch_assoc($result)){
			$response[$i]['songs_id']=$row['songs_id'];
			$response[$i]['songs_name']=$row['songs_name'];
			$response[$i]['songs_times']=$row['songs_times'];
			$response[$i]['songs_release_date']=$row['songs_release_date'];
			$i++;
		}
		echo json_encode($response, JSON_PRETTY_PRINT);	//convert data from local variable to json and then show with echo
	}
}else{
	echo 'Database Connection Failed';
}
?>