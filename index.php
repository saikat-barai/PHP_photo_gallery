<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery App</title>
    <?php include 'css.php'; ?>
</head>
<body>
    <div class="container">

    <!-- image uploading form start  -->
        <h1>Photo Gallery App</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" id="" placeholder="Photo title" required>
            <input type="file" name="image" id="" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
    <!-- image uploading form end  -->
        <hr>

        <!-- image gallery section start  -->
         <div>
            <?php
            $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <div>
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?= $row['image_path']; ?>" alt="" width="200px">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
            <?php
                endwhile;
            else:
                echo "No photos uploaded yet.";
            endif;
            ?>
         </div>
        <!-- image gallery section end -->
    </div>
</body>
</html>