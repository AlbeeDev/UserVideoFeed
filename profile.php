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
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload-modal">share a video</div>

                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="upload-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Share a video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Share</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>