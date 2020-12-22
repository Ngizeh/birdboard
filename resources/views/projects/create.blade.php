 @extends('layouts.app')

 @section('content')

 <h3>Create Project</h3>

 <form action="/projects" method="post">
 	@csrf
 	<div>
 		<div>
 			<label for="title">Title</label>
 			<input type="text" name="title">
 		</div>

 		<div>
 			<label for="description">Description</label>
 			<textarea name="description"></textarea>
 		</div>

 		<button type="submit">Add Project</button>
 		<a href="{{ route('projects.index') }}">Cancel</a>
 	</div>

 </form>


 @endsection
