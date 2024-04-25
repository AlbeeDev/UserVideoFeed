<?php
    session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        echo "welcome ".$_SESSION["email"]." ";
        echo '<a href="logout.php">logout</a>';
    } else {
        header("Location: logout.php");
        exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="app.js"></script>
</head>
<body class="bg-dark text-light">
<?php
	
?>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link active" aria-current="page" href="#"><h5>Home</h5></a>
            </div>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#">Profile</a>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <h1>Home Feed</h1>
            </div>
        </div>
        <div class="row align-items-center my-3">
        <div class="col col-1">
            <label for="sorting" class="form-label h4">Sort by:</label>
        </div>
        <div class="col col-2">
            <form action="" method="post">
                <select name="sorting" id="sorting" class="form-select">
                    <option value="1" selected>Most Recent</option>
                    <option value="2">Oldest</option>
                </select>
            </form>
        </div>
</div>

    </div>

    <?php
        for ($i = 0; $i < 10; $i++) {
            ?>
                <div class="container mt-5 text-dark">
                    <div class="row mb-4 card bg-warning">
                        <div class="row card-header mb-4">
                            <div class="col-lg-6">
                                <h2>Username<?php echo $i?></h2>
                            </div>
                        </div>
                        <div class="row card-body mb-4 ">
                            <div class="col embed-responsive ratio ratio-16x9 mb-3 ">
                                    <iframe class="embed-responsive-item " src="https://www.youtube.com/embed/JhUcHtbDOWE" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="row card-footer mb-4">
                            <form class="rating-form" action="#" method="post" name="rating">
                                <div class="star-rating">
                                    <i id="1" class="btn-warning fa fa-star" onclick="setRating(1)"></i>
                                    <i id="2" class="btn-warning fa fa-star" onclick="setRating(2)"></i>
                                    <i id="3" class="btn-warning fa fa-star" onclick="setRating(3)"></i>
                                    <i id="4" class="btn-warning fa fa-star" onclick="setRating(4)"></i>
                                    <i id="5" class="btn-warning fa fa-star" onclick="setRating(5)"></i>
                                    <input type="hidden" id="rating" name="rating" value="0">
                                </div>
                                <button class="submitstar btn btn-dark disabled">Submit Rating</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    
    
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
