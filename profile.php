<?php
    session_start();
    if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
        header("Location: logout.php");
        exit();
    }
    include 'db_connect.php';

    if(isset($_POST["share"])){
        $linkid = explode('=',$_POST["link"])[1];

        $sql = "insert into Video (link, id_user) values (?,(select  id from User u where u.username = ?));";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $linkid, $_SESSION["username"]);
            if ($stmt->execute()) {
                echo "insert done";
            }
        }

    }

    $sql = "select link from Video
    join User on Video.id_user = User.id
    where username = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $stmt->store_result();
        $videorows= $stmt->num_rows;
        $links = array();
        if ($videorows > 0) {
            $stmt->bind_result($linkid); 
            while($stmt->fetch()){
                $links[]=$linkid;
            }
        } else {
            echo "No user found with that id";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'dependencies.php' ?>
</head>
<body class="bg-dark">
    <?php include 'nav.php' ?>
    <div class="container bg-warning">
        <div class="row mt-5 bg-warning">
            <div class="col mt-2 text-center">
                <h2><?php echo $_SESSION["username"] ?>'s profile</h2>
            </div>
        </div>
        <div class="row mt-5 m-auto">
            <div class="col">
                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload-modal">Upload new</div>
            </div>
        </div>
        <div class="row mt-2 m-auto">
            <div class="col">
                <h4>Uploaded videos:</h4>
            </div>
        </div>
        <?php
        if($videorows==0) {
            ?>
            <div>
                <div class="row m-auto">
                    <div class="col">
                        <h5>No videos uploaded</h5>
                    </div>
                </div>
            </div>
            <?php
        }
        for ($i = 0; $i < $videorows; $i++) {
            ?>
        <div class="row">
            <div class="col">
                <div class="container mt-5 text-dark">
                    <div class="row mb-4 card bg-warning">
                        <div class="row card-body mb-4 ">
                            <div class="col embed-responsive ratio ratio-16x9 mb-3">
                                <iframe class="embed-responsive-item " src="https://www.youtube.com/embed/<?php echo $links[$i] ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="modal fade" id="upload-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">Share a video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" id="link" class="form-control" name="link" placeholder="" autocomplete=off>
                                    <label for="link" class="form-label">Link</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h3>Preview</h3>
                                <div class="col embed-responsive ratio ratio-16x9 mb-3">
                                    <iframe class="embed-responsive-item " src="" id="videopreview" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="share" class="btn btn-primary" data-bs-dismiss="modal">Share</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>