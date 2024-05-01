<?php
    session_start();
    if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
        header("Location: logout.php");
        exit();
    }
    include 'db_connect.php';
    $sql = "select link, username from Video join User on Video.id_user = User.id order by Video.id desc";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $videorows= $stmt->num_rows;
        $data = array();
        if ($videorows > 0) {
            $stmt->bind_result($linkid,$username); 
            while($stmt->fetch()){
                $data[$linkid] = $username;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include 'dependencies.php' ?>
</head>
<body class="bg-dark text-light">

<?php 
    include 'nav.php';
    include 'db_connect.php';
?>

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
    foreach ($data as $linkid => $username) {
        ?>
        <div class="container mt-5 text-dark">
            <div class="row mb-4 card bg-warning control-bg">
                <div class="row card-header mb-4 ">
                    <div class="col-lg-6">   
                        <h2><i class="far fa-user-circle"></i> <?php echo $username?></h2>
                    </div>
                </div>
                <div class="row card-body mb-4">
                    <div class="col embed-responsive ratio ratio-16x9 mb-3 ">
                            <iframe class="embed-responsive-item " src="https://www.youtube.com/embed/<?php echo $linkid ?>" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row card-footer mb-4">
                    <form class="rating-form" action="#" method="post" name="rating">
                        <div class="star-rating">
                            <i id="1" class="btn-warning fa fa-star control-bg" onclick="setRating(1,this)"></i>
                            <i id="2" class="btn-warning fa fa-star control-bg" onclick="setRating(2,this)"></i>
                            <i id="3" class="btn-warning fa fa-star control-bg" onclick="setRating(3,this)"></i>
                            <i id="4" class="btn-warning fa fa-star control-bg" onclick="setRating(4,this)"></i>
                            <i id="5" class="btn-warning fa fa-star control-bg" onclick="setRating(5,this)"></i>
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
</body>
</html>
