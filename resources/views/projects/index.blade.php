<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Projects</h3>
	<ul>
		@forelse ($projects as $project)
		<li>
			{{ $project->title }}
		</li>
		<p>
			{{ $project->description }}
		</p>
		@@empty
		 <p>You don't have projects yet</p>
		@endforeach
	</ul>
</body>
</html>