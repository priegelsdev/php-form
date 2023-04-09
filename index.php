<?php include 'inc/header.php'; ?>
<div>
  <h2>Feedback</h2>
  <form action="">
    <div>
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your name">
    </div>
    <div>
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your email">
    </div>
    <div>
      <label for="body" class="form-label">Feedback</label>
      <textarea class="form-control" name="body" placeholder="Enter your feedback"></textarea>
    </div>
    <div>
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>
</main>
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