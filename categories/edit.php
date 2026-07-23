<?php

require '../config/auth.php';
require '../config/database.php';

$id = $_GET['id'];

$data = mysqli_query(
$conn,
"SELECT * FROM categories
WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

include '../includes/header.php';

?>

<div class="p-6">

<h1 class="text-2xl font-bold mb-4">
Edit Kategori
</h1>

<form action="update.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $row['id']; ?>">

<input
type="text"
name="name"
value="<?= $row['name']; ?>"
class="border p-3 w-full rounded mb-4">

<button
class="bg-yellow-500 text-white px-4 py-2 rounded">

Update

</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>