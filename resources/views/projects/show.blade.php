 @extends('layouts.app')

 @section('content')

 <header>
 	<div class="flex items-center py-4">
 		<h3 class="text-gray-400 font-normal pr-4"><a href="{{ route('projects.index') }}">My Projects</a> / {{ $project->title}} </h3>
 		<a href="#" class="bg-blue-400 py-2 px-6 text-white rounded-lg">Add Task</a>
 	</div>
 </header>

 <main>
 	<div class="flex">
 		<div class="w-3/4 mr-8">
 			@foreach ($project->tasks as $task)
 			<div class="card mb-3">{{ $task->body }}</div>
 			@endforeach
 			<form action="{{ route('tasks.store', $project->id) }}" method="post">
 				@csrf
 				<input class="card mb-3 w-full py-4" placeholder="Begin to add task ...." name="body">
 			</form>

 			<h3 class="text-gray-400 font-normal pr-4 mt-6 mb-3">General Notes </h3>
 			<textarea class="card mb-3 w-full h-32"></textarea>
 		</div>
 		<div class="w-1/4">
 			@include('partials.card')
 		</div>
 	</div>
 </main>
 @endsection
