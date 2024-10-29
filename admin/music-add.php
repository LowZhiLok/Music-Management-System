<!-- Low Zhi Lok -->
<?php
include('../config/callOOPdbcon.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include("includes/header.php");
?>

<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('../message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Add your music</h4>
                </div>
                <div class="card-body">

                    <form action="codes/music-code.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="">Music Name</label>
                            <input type="text" name="musicName" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Music</label>
                            <input type="file" name="musicAudio" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Song Times</label>
                            <input type="text" name="songTimes" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Song Images</label>
                            <input type="file" name="songImages" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Song Release Date</label>
                            <input type="text" name="sReleaseDate" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="done_btn" class="btn btn-primary">Done!</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
include("includes/scripts.php");
?>