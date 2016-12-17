<div class="col-md-4">         
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post"> <!-- Vodi na search.php stranicu -->
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name ="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!-- Forma za pretragu-->
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                     <?php 
                        $query = "SELECT * FROM categories"; // Upit za bazu
                        $select_categories_sidebar = mysqli_query($connection, $query); // Salje upit uz konekciju bazi, konekcija je importovana u index fajlu db.php   
                     ?>                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12"> <!-- Bootstrap grid sistem 12 za celom sirinom 6 je polovina bila po default-u -->
                            <ul class="list-unstyled">
                               <?php
                                    while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                        $cat_title = $row["cat_title"];
                                        echo "<li><a href='#'>{$cat_title}</a></li>";  // Prikazujemo kao list element i link da bi licio na original samo je dinamicki vuce iz baze
                                    }
                               ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php"; ?>
</div>