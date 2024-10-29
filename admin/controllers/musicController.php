<!-- Low Zhi Lok -->
<?php 
class musicController{
    public function __construct()
    {
        $db = new OOPdbcon;
        $this->conn = $db->conn;
    }

    public function edit($id){
        $music_id = validateInput($this->conn, $id);
        $musicQuery = "SELECT * FROM upload_song WHERE songs_id='$music_id' LIMIT 1";
        $result = $this->conn->query($musicQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function delete($id){
        $music_id = validateInput($this->conn, $id);
        $musicDeleteQuery = "DELETE FROM upload_song WHERE songs_id='$music_id' LIMIT 1";
        $result = $this->conn->query($musicDeleteQuery);

        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>