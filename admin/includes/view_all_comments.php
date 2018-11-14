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
        <td>Appreouve</td>
        <td>UnApprove</td>

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
        $comment_post_id = $row['comment_post_id'];
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
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_post_id_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";

        echo "<td><a href='comments.php?approuve={$comment_id}'>Approuve</a></td>";
        echo "<td><a href='comments.php?unapprouve={$comment_id}'>Unapprouve</a></td>";

        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
    }

    ?>

    </tbody>

</table>
<?php

if (isset($_GET['approuve'])) {
    $the_comment_id = $_GET['approuve'];
    $query = "UPDATE comments SET comment_status = 'approuve' WHERE comment_id = {$the_comment_id}";
    $approuve_comment_query = mysqli_query($connection, $query);

    header("Location: comments.php");
}

if (isset($_GET['unapprouve'])) {
    $the_comment_id = $_GET['unapprouve'];
    $query = "UPDATE comments SET comment_status = 'unapprouve' WHERE comment_id = {$the_comment_id}";
    $unapprouve_comment_query = mysqli_query($connection, $query);

    header("Location: comments.php");
}


if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);

    header("Location: comments.php");
}

?>
