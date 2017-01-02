<?php

    function comfirmQuery($result) {
         global $connection;
         if(!$result) {
         die("Query failed " . mysqli_error($connection));
     }
    }




    // FUNKCIJA ZA DODAVANJE KATEGORIJA 
    function insert_categories() {
            global $connection;
        
              if(isset($_POST['submit'])) {
                $cat_title = $_POST['cat_title']; 

                if($cat_title == "" || empty($cat_title)) {
                    echo "This field should not be empty!";
                } else {
                    $query = "INSERT INTO categories(cat_title) ";
                    $query .= "VALUES('{$cat_title}')";

                    $create_category_query = mysqli_query($connection, $query);

                    if(!$create_category_query) {
                        die("Query failed " . mysqli_error($connection));
                    }
                }
            }   
    }

    // FUNKCIJA ZA PRIKAZ KATEGORIJA IZ BAZE
    function findAllCategories() {
        global $connection;
        
            $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];
                echo "<tr>";
                echo "<td>{$cat_id}</td>"; // srednje zagrade just radi vizuelnog odvajanja varijabli i stringa moze i bez njih
                echo "<td>{$cat_title}</td>";
                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                echo "</tr>";
                }
        
    }

    // FUNKCIJA ZA BRISANJE KATEGORIJA
    function delete_categories() {
        global $connection;
        
        if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $the_cat_id ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");  // Radi refresh stranice
        }
    }

?>