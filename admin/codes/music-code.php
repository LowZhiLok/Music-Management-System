<!-- Low Zhi Lok -->
<?php
include('../../config/callOOPdbcon.php');
include_once('../controllers/musicController.php');

if (isset($_POST['done_btn'])) {
    $musicName = validateInput($db->conn, $_POST['musicName']);

    // Upload audio
    $songAudio = $_FILES['musicAudio'];
    // print_r($songAudio);
    // echo '<br>';
    $audioFileName = $songAudio['name'];
    // print_r($audioFileName);
    // echo '<br>';
    $audioFileError = $songAudio['error'];
    // print_r($audioFileError);
    // echo '<br>';
    $audioFileTemp = $songAudio['tmp_name'];
    // print_r($audioFileTemp);
    // echo '<br>';
    $filename_seperate = explode('.', $audioFileName);
    // print_r($filename_seperate);
    // echo '<br>';
    $file_extension = strtolower(end($filename_seperate));
    // print_r($file_extension);
    // echo '<br>';
    // echo '<br>';

    $songTimes = validateInput($db->conn, $_POST['songTimes']);
    // echo $songTimes;
    // echo '<br>';

    // Upload images
    $songImages = $_FILES['songImages'];
    // print_r($songImages);
    // echo '<br>';
    $imageFileName = $songImages['name'];
    // print_r($imageFileName);
    // echo '<br>';
    $imageFileError = $songImages['error'];
    // print_r($imageFileError);
    // echo '<br>';
    $imageFileTemp = $songImages['tmp_name'];
    // print_r($imageFileTemp);
    // echo '<br>';
    $filename_seperate = explode('.', $imageFileName);
    // print_r($filename_seperate);
    // echo '<br>';
    $file_extension = strtolower(end($filename_seperate));
    // print_r($file_extension);

    // Input of Release Date
    $sReleaseDate = validateInput($db->conn, $_POST['sReleaseDate']);
    // echo $sReleaseDate;
    // echo '<br>';

    // Check image and mp3 format is correct or not
    $extension = array('jpeg', 'jpg', 'png', 'mp3', 'jfif');
    if(in_array($file_extension, $extension)){
        $upload_image = '../../upload_Images/' .$imageFileName;
        $uploadAudio = '../../uploadAudio/' .$audioFileName;

        move_uploaded_file($imageFileTemp, $upload_image);
        move_uploaded_file($audioFileTemp, $uploadAudio);
        $uploadMusicQuery = "INSERT INTO upload_song (songs_name, newSongs, songs_times, songs_images, release_date) VALUES ('$musicName', '$uploadAudio', '$songTimes', '$upload_image', '$sReleaseDate')";

        $result = $db->conn->query($uploadMusicQuery);
        if($result){
            redirect("Music Added Successfully", "/admin/music-add.php");
        }else{
            redirect("Something Went Wrong", "/admin/music-add.php");
        }
    }else{
        redirect("Wrong File Format", "/admin/music-add.php");
    }
}

// Update
if(isset($_POST['update_btn'])){
    $musicID = validateInput($db->conn, $_POST['musicID']);
    $musicName = validateInput($db->conn, $_POST['musicName']);

    // Upload audio
    $songAudio = $_FILES['musicAudio'];
    // print_r($songAudio);
    // echo '<br>';
    $audioFileName = $songAudio['name'];
    // print_r($audioFileName);
    // echo '<br>';
    $audioFileError = $songAudio['error'];
    // print_r($audioFileError);
    // echo '<br>';
    $audioFileTemp = $songAudio['tmp_name'];
    // print_r($audioFileTemp);
    // echo '<br>';
    $filename_seperate = explode('.', $audioFileName);
    // print_r($filename_seperate);
    // echo '<br>';
    $file_extension = strtolower(end($filename_seperate));
    // print_r($file_extension);
    // echo '<br>';
    // echo '<br>';

    $songTimes = validateInput($db->conn, $_POST['songTimes']);
    // echo $songTimes;
    // echo '<br>';

    // Upload images
    $songImages = $_FILES['songImages'];
    // print_r($songImages);
    // echo '<br>';
    $imageFileName = $songImages['name'];
    // print_r($imageFileName);
    // echo '<br>';
    $imageFileError = $songImages['error'];
    // print_r($imageFileError);
    // echo '<br>';
    $imageFileTemp = $songImages['tmp_name'];
    // print_r($imageFileTemp);
    // echo '<br>';
    $filename_seperate = explode('.', $imageFileName);
    // print_r($filename_seperate);
    // echo '<br>';
    $file_extension = strtolower(end($filename_seperate));
    // print_r($file_extension);

    // Input of Release Date
    $sReleaseDate = validateInput($db->conn, $_POST['sReleaseDate']);
    // echo $sReleaseDate;
    // echo '<br>';

    // Check image and mp3 format is correct or not
    $extension = array('jpeg', 'jpg', 'png', 'mp3', 'jfif');
    if(in_array($file_extension, $extension)){
        $upload_image = '../../upload_Images/' .$imageFileName;
        $uploadAudio = '../../uploadAudio/' .$audioFileName;

        move_uploaded_file($imageFileTemp, $upload_image);
        move_uploaded_file($audioFileTemp, $uploadAudio);
        $updateMusicQuery = "UPDATE upload_song SET songs_name='$musicName', newSongs='$uploadAudio', songs_times='$songTimes', songs_images='$upload_image', release_date='$sReleaseDate' WHERE songs_id='$musicID' LIMIT 1";

        $result = $db->conn->query($updateMusicQuery);
        if($result){
            redirect("Music Updated Successfully", "/admin/music-view.php");
        }else{
            redirect("Something Went Wrong", "/admin/music-view.php");
        }
    }else{
        redirect("Wrong File Format", "/admin/music-view.php");
    }

}

// Delete
if(isset($_POST['deleteBtn'])){
    $musicID = validateInput($db->conn, $_POST['deleteBtn']);
    $music = new musicController;
    $result = $music->delete($musicID);

    if($result){
        redirect("Music Deleted Successfully", "/admin/music-view.php");
    }else{
        redirect("Something Went Wrong", "/admin/music-view.php");
    }
}
?>