<?php
    session_start()
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
                <h5>Uploaded videos:</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container mt-5 text-dark">
                    <div class="row mb-4 card bg-warning">
                        <div class="row card-body mb-4 ">
                            <div class="col embed-responsive ratio ratio-16x9 mb-3">
                                <iframe class="embed-responsive-item " src="https://www.youtube.com/embed/JhUcHtbDOWE" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <input type="text" id="link" class="form-control" placeholder="" autocomplete=off>
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
                                <button type="button" class="btn btn-primary">Share</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>