<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>title</title>
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
                    <option>Select A Category</option>
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
            <td><input type="text" name="post_title" /></td>
        </tr>
        <tr>
            <td align="right">Post Keywords:</td>
            <td><input type="text" name="post_title" /></td>
        </tr>
        <tr>
            <td align="right">Post Image:</td>
            <td><input type="text" name="post_title" /></td>
        </tr>
        <tr>
            <td align="right">Post Content:</td>
            <td><input type="text" name="post_title" /></td>
        </tr>
        <tr>
            <td colspan="6" align="center"><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>
</body>
</html>