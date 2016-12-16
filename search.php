<?php include "includes/db.php";?>
<!-- Header -->
<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php 
                
                //Provera da li je search unet ili trazen kako se ne bi prikazivala error poruka
                if(isset($_POST["submit"])) {
                    $search = $_POST["search"];
                    //Upit za bazu za pretragu
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);
                    if (!$search_query) {
                        die("Query failed " . mysqli_error($connection));
                    }
                    //Provera da li ima rezultata u pretrazi
                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h3>NO RESULT</h3>";
                    } else {
                        
                         
                 
                    // Za prikaz koristimo while petlju    
                        while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_content = $row["post_content"];
                 
                ?>   
                         
                     <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="search.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>      
                             
                                    
                 <?php } 
                        
                    }
                }
    
               ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include "includes/footer.php";?>