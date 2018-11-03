<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php
                        insert_categories();
                        ?>

                        <!-- add category form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>

                    </div>
                    <!-- finish add category form -->

                    <div class="col-xs-6">

                        <!-- add category form -->
                        <table class="table table-bordered hover">
                            <thead>
                            <tr>
                                <th width="50%">Id</th>
                                <th width="50%">Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php //find all categories querry
                            findAllCategories();
                            ?>

                            <?php
                            deleteCategories();
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- finish add category form -->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>