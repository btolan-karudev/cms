<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

global $connection;
$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_title = $row['post_title'];
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
}
// WHERE post_id = {$post_id}
?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class=" form-control" name="title">
    </div>

        <div class="form-group">
            <label for="post_category">Category</label>
            <select name="post_category_id" id="post_category">

                <?php

                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);

                confirmQuery($select_categories);

                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";

                }

                ?>
            </select>

        </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
    </div>

    <!--    <div class="form-group">-->
    <!--        <label for="post_category">Category</label>-->
    <!--        <select name="post_category_id" id="">-->

    <!--            --><?php
    //
    //            $query = "SELECT * FROM categories";
    //            $select_categories = mysqli_query($connection, $query);
    //
    //            confirmQuery($select_categories);
    //
    //            while ($row = mysqli_fetch_assoc($select_categories)) {
    //                $cat_id = $row['cat_id'];
    //                $cat_title = $row['cat_title'];
    //
    //                echo "<option value='$cat_id'>{$cat_title}</option>";
    //
    //            }
    //
    //            ?>
    <!--        </select>-->
    <!---->
    <!--    </div>-->
    <!--    <div class="form-group">-->
    <!--        <label for="users">Users</label>-->
    <!--        <select name="post_user" id="">-->

    <!--            --><?php
    //            $users_query = "SELECT * FROM users";
    //            $select_users = mysqli_query($connection, $users_query);
    //
    //            confirmQuery($select_users);
    //
    //            while ($row = mysqli_fetch_assoc($select_users)) {
    //                $user_id = $row['user_id'];
    //                $username = $row['username'];
    //                echo "<option value='{$username}'>{$username}</option>";
    //            }
    //            ?>
    <!--        </select>-->
    <!--    </div>-->
    <!---->
    <!--    <div class="form-group">-->
    <!--        <select name="post_status" id="">-->
    <!--            <option value="draft">Post Status</option>-->
    <!--            <option value="published">Published</option>-->
    <!--            <option value="draft">Draft</option>-->
    <!--        </select>-->
    <!--    </div>-->

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100px" src="images/<?php echo $post_image; ?>" alt="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
            <?php echo $post_content; ?>
         </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>