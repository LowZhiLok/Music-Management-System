<!-- Low Zhi Lok -->
<?php
include('../config/callOOPdbcon.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include("includes/header.php");
include_once('controllers/musicController.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Music Edit</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $music_id = validateInput($db->conn, $_GET['id']);
                        $music = new musicController;
                        $result = $music->edit($music_id);

                        if ($result) {
                    ?>

                            <form action="codes/music-code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="musicID" value="<?= $result['songs_id'] ?>" />

                                <div class="mb-3">
                                    <label for="">Music Name</label>
                                    <input type="text" name="musicName" value="<?= $result['songs_name'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Music</label>
                                    <input type="file" name="musicAudio" value="<?= $result['newSongs'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Song Times</label>
                                    <input type="text" name="songTimes" value="<?= $result['songs_times'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Song Images</label>
                                    <input type="file" name="songImages" value="<?= $result['songs_images'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Song Release Date</label>
                                    <input type="text" name="sReleaseDate" value="<?= $result['release_date'] ?>" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_btn" class="btn btn-primary">Update Music</button>
                                </div>
                            </form>

                    <?php
                        } else {
                            echo '<h4>No Record Found</h4>';
                        }
                    } else {
                        echo "<h4>Something Went Wrong</h4>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>