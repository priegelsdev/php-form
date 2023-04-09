<?php include 'inc/header.php'; ?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="container">

  <h2>Past Feedback</h2>

  <?php if (empty($feedback)) : ?>
    <p>There is no fb</p>
  <?php endif; ?>

  <?php foreach ($feedback as $item) : ?>

    <div class="card">
      <div class="card-body">
        <?php echo $item['body']; ?>
        <div class="card-author">
          By <?php echo $item['name']; ?> on <?php $newDate = date("d.m.Y", strtotime($item['date']));
                                              echo $newDate; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</main>
</body>

</html>