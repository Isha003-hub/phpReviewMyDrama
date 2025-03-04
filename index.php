<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kdramas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel = "stylesheet" href = "styles/styles.css">
</head>
<body>
    <?php
        include("reusables/nav.php");
    ?>

    <main>
        <?php
            include("reusables/connection.php");
        ?>

        <div class="container">
            <div class="row ">
                <div class="col">
                    <h1>Best of Kdramas</h1>
                </div>
            </div>

            <div class="row">
                <?php  
                    $query = "SELECT * FROM dramas";
                    $dramas = mysqli_query($connect, $query);
                
                    foreach($dramas as $drama)
                    {
                        echo '   
                            <div class="col-md-4">
                                <div class="card  drama-card mb-4">
                                    <img src= "posters/'. $drama['poster_url'] .'" class="card-img-top" alt="'. $drama['title'].'">
                                
                                    <div class="card-body">
                                    <h5 class="card-title">'.$drama['title'].' <span class="badge">'.$drama['rating'].' </span></h5> 
                                    <h6 class="card-subtitle mb-2 text-muted">'.$drama['release_year'].'</h6>
                                    <h6 class="card-subtitle mb-2">Network: '.$drama['network'].'</h6>
                                    <p class="card-text">'.$drama['description'].'</p>
                                    <p class="card-text cast" >Cast: '.$drama['cast'].'</p> 
                                    <form action="reviews.php" method="GET"> 
                                        <input type="hidden" name="drama_id" value="'.$drama['id'].'">
                                        <button type="submit" class="btn btn-submit">View Reviews</button>
                                    </form>
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