<table class="table table-bordered table-hover">
    <thead class="text-danger">
    <tr>
        <td>Id</td>
        <td>Author</td>
        <td>Comment</td>
        <td>Email</td>
        <td>Status</td>
        <td>In Response To</td>
        <td>Date</td>
        <td>Appreouved</td>
        <td>UnApproved</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    </thead>
    <tbody>

    <?php

    global $connection;
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_comments)) {

        $comment_id = $row['comment_id'];
        $comment_category_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];


        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";


//        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
//        $select_categories_id = mysqli_query($connection, $query);
//        while ($row = mysqli_fetch_assoc($select_categories_id)) {
//            $cat_title = $row['cat_title'];
//            $cat_id = $row['cat_id'];
//
//            echo "<td>{$cat_title}</td>";
//        }

        echo "<td>{$comment_status}</td>";
        echo "<td>Some titile</td>";
        echo "<td>{$comment_date}</td>";

        echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Approuved</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Unapprouve</a></td>";

        echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Edit</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
    }

    ?>

    </tbody>

</table>
<?php
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
}
?>
