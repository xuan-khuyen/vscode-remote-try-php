<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Upload Files</title>
    <style>
        /* Custom styles */
        body {
            padding: 20px;
        }
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Upload Files</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="mt-3">
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">Select file to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Upload File</button>
        </form>

        <h2 class="mt-5">Uploaded Files</h2>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th><a href="?sort=name">Name</a></th>
                    <th><a href="?sort=upload_date">Upload Date</a></th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'show_files.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
