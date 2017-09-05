<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$salespeople_result = find_salesperson_by_id($id);
// No loop, only one result
$salesperson = db_fetch_assoc($salespeople_result);
?>

<?php $page_title = 'Staff: Salesperson ' . htmlspecialchars($salesperson['first_name']) . " " . urlencode(htmlspecialchars($salesperson['last_name'])); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Salespeople List</a><br />

  <h1>Salesperson: <?php echo htmlspecialchars($salesperson['first_name']) . " " . htmlspecialchars($salesperson['last_name']); ?></h1>

  <?php
    echo "<table id=\"salesperson\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . htmlspecialchars($salesperson['first_name']) . " " . htmlspecialchars($salesperson['last_name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Phone: </td>";
    echo "<td>" . htmlspecialchars($salesperson['phone']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Email: </td>";
    echo "<td>" . htmlspecialchars($salesperson['email']) . "</td>";
    echo "</tr>";
    echo "</table>";

    db_free_result($salespeople_result);
  ?>
  <br />
  <a href="edit.php?id=<?php echo urlencode(htmlspecialchars($salesperson['id'])); ?>">Edit</a><br />
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
