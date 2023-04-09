<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:0.5rem">
    Select image to Upload
    <input type="file" name="upload">
    <input type="submit" value="Submit" name="submit" style="width:100px">
  </form>
</body>

</html>

<?php
// allowed file extensions
$allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];

if (isset($_POST['submit'])) {
  // check if file was uploaded
  if (!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $target_dir = "uploads/$file_name";
    // get file ext
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    if (in_array($file_ext, $allowed_ext)) {
      // validate file size
      if ($file_size <= 1000000) {
        // upload file
        move_uploaded_file($file_tmp, $target_dir);

        echo '<p style="color: green;">File uploaded!</p>';
      } else {
        echo '<p style="color: red;">File too large.</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type.</p>';
      echo $message;
    }
  } else {
    $message = '<p style="color: red;">Please choose a file.</p>';
    echo $message;
  }
}
?>