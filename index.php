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
            $get_cats = "select * from catagories";
            $run_cats = mysql_query($get_cats);
            while ($cats_row=mysql_fetch_array($run_cats)){
                $cat_id=$cats_row['cat_id'];
                $cat_title=$cats_row['cat_title'];

                echo "<li><a herf='index.php?cat=$cat_id'>$cat_title</a></li>";
            };
            ?>
        </ul>
    </nav>
    <div>
        <article class="main">post body</article>
        <aside class="side">sidebar</aside>
    </div>
    <footer class="bottom">footer</footer>
</div>

</body>
</html>