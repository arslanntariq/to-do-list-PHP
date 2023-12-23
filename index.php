<?php

  $conn = mysqli_connect('localhost', 'username', 'password, 'DBname');
  if(!$conn)
  {
    echo 'Connection error: '. mysqli_connect_error();
  }
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
  <h1>To-Do List</h1>
  <form action="index.php" method="post">
    <input type="text" name="new_task" placeholder="Add new task" required>
    <button type="submit">Add</button>

    <?php if ($result->num_rows > 0) : ?>
      <ul>
        <?php while($row = $result->fetch_assoc()) : ?>
          <li>
            <?php if ($row['completed'] == 1) : ?>
              <strike><?php echo $row['task']; ?></strike>
              <input type="checkbox" name="complete_task[<?php echo $row['id']; ?>]" checked>
            <?php else : ?>
              <?php echo $row['task']; ?>
              <input type="checkbox" name="complete_task[<?php echo $row['id']; ?>]">
            <?php endif; ?>
            <a href="index.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </form>

  <?php

  if (isset($_POST['new_task'])) 
  {
      $new_task = $_POST['new_task'];
      $sql = "INSERT INTO tasks (task) VALUES ('$new_task')";
      $conn->query($sql);
      header("Location: index.php");
  }

  if (isset($_GET['delete_id']))
   {
      $delete_id = $_GET['delete_id'];
      $sql = "DELETE FROM tasks WHERE id=$delete_id";
      $conn->query($sql);
      header("Location: index.php");
  }

  if (isset($_POST['complete_task']))
   {
      foreach ($_POST['complete_task'] as $id => $value) 
      {
          $completed = $value ? 1 : 0;
          $sql = "UPDATE tasks SET completed=$completed WHERE id=$id";
          $conn->query($sql);
      }
      header("Location: index.php");
  }

  $conn->close();
  ?>
</body>
</html>
