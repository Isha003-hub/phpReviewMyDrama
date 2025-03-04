<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel = "stylesheet" href = "styles/styles.css">
</head>
<body>
    <?php
        include("reusables/nav.php");
    ?>

    <main>
        <div class="container">
            <?php  
                $drama_id = $_GET['drama_id'];
                include('reusables/connection.php');
                $query = "SELECT dramas.title FROM dramas INNER JOIN reviews ON reviews.drama_id = dramas.id WHERE `drama_id` = '$drama_id'";
                $drama = mysqli_query($connect,$query);
                $result = mysqli_fetch_assoc($drama); 
            ?>

            <div class="row">
                <div class="col" style="padding: 30px;">
                <?php echo'<h1>Reviews of '.$result['title'].'</h1>';?>
                </div>
            </div>

            <div class="row">
                <?php  
                    $drama_id = $_GET['drama_id']; 
                    include("reusables/connection.php");
                    $query = "SELECT * FROM reviews WHERE `drama_id`='$drama_id'";
                    $reviews = mysqli_query($connect, $query);
                
                    foreach($reviews as $review)
                    {
                        echo '   
                            <div class="col-md-12">
                                <div class="card mb-4 review-card ">
                                    <div class="card-body">
                                    <h5 class="card-title">'.$review['user_name'].'<span class="badge">'.$review['rating'].'&nbsp;<i class="bi bi-star-fill" style="color: white;"></i></span></h5>
                                    <p class="card-text">'.$review['review_text'].'</p>
                                    </div>
                                </div> 
                            </div>
                        ';
                    }        
                ?>
            </div>
        </div>
    </main>

    <?php
        include("reusables/footer.php"); 
    ?>
</body>
</html>