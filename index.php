<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8">
<title>Kennetic Posts</title>
<link rel="stylesheet" href="css/styles.css" media="all" />
</head>

<body>
    
<div class="container">
    <div class="head">
        <img src="images/head.jpg" alt="header image" />
    </div>
    <nav class="nav">
        <ul>
            <?php
            include("includes/DB_connect.php");
            $get_cats = "SELECT * FROM catagories";
            $run_cats = mysqli_query($sql, $get_cats);
            while ($cats_row=mysqli_fetch_array($run_cats)){
                $cat_id=$cats_row['cat_id'];
                $cat_title=$cats_row['cat_title'];

                echo "<li><a herf='index.php?cat=$cat_id'>$cat_title</a></li>";
            };
            ?>
        </ul>
        <div class="search">
            <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="search_query" />
                <input type="submit" name="search" value="Search" />
            </form>
        </div>
    </nav>
    <div>
        <article class="main">post body</article>
        <aside class="side">sidebar</aside>
    </div>
    <footer class="bottom">footer</footer>
</div>

</body>
</html>