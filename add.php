<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'EB Garamond', serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-red-900 to-red-950 min-h-screen flex items-center justify-center">

<div class="bg-red-50 p-6 rounded-xl shadow w-full max-w-md">
  <h2 class="text-2xl font-bold mb-4 text-red-900">➕ Add New Book</h2>

  <form action="insert.php" method="POST" class="space-y-4">
    <input type="text" name="title" placeholder="Book Title" required
      class="w-full p-3 border rounded-lg">

    <input type="text" name="author" placeholder="Author Name" required
      class="w-full p-3 border rounded-lg">

    <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required
      class="w-full p-3 border rounded-lg">

    <button class="w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-800">
      Add Book
    </button>
  </form>
</div>

</body>
</html>
