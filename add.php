<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-6 rounded-xl shadow w-full max-w-md">
  <h2 class="text-2xl font-bold mb-4">➕ Add New Book</h2>

  <form action="insert.php" method="POST" class="space-y-4">
    <input type="text" name="title" placeholder="Book Title" required
      class="w-full p-3 border rounded-lg">

    <input type="text" name="author" placeholder="Author Name" required
      class="w-full p-3 border rounded-lg">

    <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required
      class="w-full p-3 border rounded-lg">

    <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
      Add Book
    </button>
  </form>
</div>

</body>
</html>
