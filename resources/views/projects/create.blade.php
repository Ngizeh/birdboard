<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Create Project</h3>
	<form action="/projects" method="post">
		@csrf
		<label for="title">Title</label>
		<input type="text" name="title">

		<label for="description">Description</label>
		<textarea name="description"></textarea>

		<button type="submit">Add Project</button>

	</form>
</body>
</html>