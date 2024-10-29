<!-- Low Zhi Lok -->
<?php
include('../config/callOOPdbcon.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include("includes/header.php");
// include_once('controllers/musicController.php');
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Music View</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td>ID</td> -->
                                    <th>ID</th>
                                    <th>Music Name</th>
                                    <th>Music</th>
                                    <th>Song Times</th>
                                    <th>Song Images</th>
                                    <th>Release Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $musicViewquery = "SELECT * FROM upload_song";
                                $result = $db->conn->query($musicViewquery);
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>

                                        <tr>
                                            <td><?= $row['songs_id'] ?></td>
                                            <td><?= $row['songs_name'] ?></td>
                                            <td> <audio controls><source src="<?= $row['newSongs']; ?>" type="audio/mpeg"></source></audio> </td>
                                            <td><?= $row['songs_times'] ?></td>
                                            <td> <img style="width: 150px;" src="<?= $row['songs_images'] ?>" /> </td>
                                            <td><?= $row['release_date'] ?></td>
                                            <td>
                                                <a href="music-edit.php?id=<?= $row['songs_id']; ?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <form action="codes/music-code.php" method="POST">
                                                <button type="submit" name="deleteBtn" value="<?= $row['songs_id'] ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo 'No Record Found';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>