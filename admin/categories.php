 <!-- Header -->
<?php include "includes/admin_header.php"; ?>

 <div id="wrapper">

 <!-- Navigation -->
 <?php include "includes/admin_navigation.php"; ?>
        
 

    <div id="page-wrapper">

         <div class="container-fluid">

            <!-- Page Heading -->
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin page
                        <small>Author</small>
                    </h1>
                    
                    <div class="col-xs-6">
                        <form action="">
                            <div class="form-group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div> <!--Kategorija forma-->
                    
                    
                    <div class="col-xs-6">
                       
                       <?php 
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);   
                        ?>      
                       
                        <table class="table table-bordered table-hover"> <!--Koristimo bootstrap klase radi dizajna-->
                            <thread>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thread>
                            <tbody>
                               
                               <?php
                                    while($row = mysqli_fetch_assoc($select_categories)) {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];
                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>"; // srednje zagrade just radi vizuelnog odvajanja varijabli i stringa moze i bez njih
                                        echo "<td>{$cat_title}</td>";
                                        echo "</tr>";
                                    }
                               ?>

                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div> <!-- /.row -->

        </div> <!-- /.container-fluid -->

    </div> <!-- /#page-wrapper -->


<?php include "includes/admin_footer.php" ?>  <!-- Footer -->