,<?php
// Database connection
require("connection_file.php");

// Get blog ID from URL
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $query = "SELECT * FROM blogs WHERE id = '$blog_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $blog = mysqli_fetch_assoc($result);
        $blog_title = htmlspecialchars($blog['title']);
        $blog_date = date('d M Y, H:i A', strtotime($blog['created_at']));
        $blog_image = htmlspecialchars($blog['image']);
        $blog_content = nl2br(htmlspecialchars($blog['content']));
    } else {
        echo "<p>Blog not found.</p>";
        exit;
    }
} else {
    echo "<p>Invalid request.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog_title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .blog-container {
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .blog-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }
        .date {
            color: #888;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .back-button {
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background: #02394f;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .back-button:hover {
            background: #011c26;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .blog-container {
                padding: 15px;
            }
            h2 {
                font-size: 22px;
            }
            .date {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .blog-container {
                padding: 10px;
            }
            h2 {
                font-size: 20px;
            }
            .date {
                font-size: 12px;
            }
            .back-button {
                padding: 8px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <div class="main-content">
            <a href="blog.php" class="back-button">
                &#8592; Back
            </a>
            <h2><?php echo $blog_title; ?></h2>
            <p class="date">Posted on: <?php echo $blog_date; ?></p>
            <img src="<?php echo "admin_panel_dif/".$blog_image; ?>" alt="Blog Image">
            <p><?php echo $blog_content; ?></p>
        </div>
    </div>
</body>
</html>
