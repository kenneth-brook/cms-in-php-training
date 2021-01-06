<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>title</title>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>

<body>
<form action="insert_post.php" method="post" enctype="multipart/form-data">
    <table width="800" align="center" border="2">
        <tr>
            <td colspan="6" align="center"><h1>Insert New Post</h1></td>
        </tr>
        <tr>
            <td align="right">Post Title:</td>
            <td><input type="text" name="post_title" /></td>
        </tr>
        <tr>
            <td align="right">Post Category:</td>
            <td>
                <select name="cat">
                    <option value="select">Select A Category</option>
                    <?php
                        include("../includes/DB_connect.php");
                        $get_cats = "SELECT * FROM catagories";
                        $run_cats = mysqli_query($sql, $get_cats);
                        while ($cats_row=mysqli_fetch_array($run_cats)){
                            $cat_id=$cats_row['cat_id'];
                            $cat_title=$cats_row['cat_title'];
            
                            echo "<option value='$cat_id'>$cat_title</option>";
                        };
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Post Author:</td>
            <td><input type="text" name="post_author" /></td>
        </tr>
        <tr>
            <td align="right">Post Keywords:</td>
            <td><input type="text" name="post_keywords" /></td>
        </tr>
        <tr>
            <td align="right">Post Image:</td>
            <td><input type="file" name="post_image" /></td>
        </tr>
        <tr>
            <td align="right">Post Content:</td>
            <td><textarea name="post_content" rows="20" cols="50"></textarea></td>
        </tr>
        <tr>
            <td colspan="6" align="center"><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $post_title = $_POST['post_title'];
        $post_date = date('m-d-y');
        $post_cat = $_POST['cat'];
        $post_author = $_POST['post_author'];
        $post_keywords = $_POST['post_keywords'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
    }

    if($post_title=='' OR $post_cat=='select' OR $post_author=='' OR $post_keywords=='' OR $post_image=='' OR $post_content==''){
        echo "<script>alert('All form areas must contain data')</script>";
        exit();
    }
    else {
        move_uploaded_file($post_image_tmp, "post_images/$post_image");
        $insert_posts = "insert into posts (category_id, post_title, post_date, post_author, post_keywords, post_image, post_content) values ('$post_cat', '$post_title', '$post_date', '$post_author', '$post_keywords', '$post_image', '$post_content')";

        $run_posts = mysqli_query($sql, $insert_posts);
        if(mysqli_query($sql, $run_posts)){
            echo "<script>alert('Post Created!')</script>";
            echo "<script>window.open('insert_post.php','_self')</script>";
        }
    }
?>