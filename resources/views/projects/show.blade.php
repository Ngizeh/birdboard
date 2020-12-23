 @extends('layouts.app')

 @section('content')

 <header>
 	<div class="flex items-center py-4">
 		<h3 class="text-gray-400 font-normal pr-4">My Projects / {{ $project->title}} </h3>
 		<a href="#" class="bg-blue-400 py-2 px-6 text-white rounded-lg">Add Task</a>
 	</div>
 </header>

 <main>
 	<div class="flex">
 		<div class="w-3/4 mr-8">
 			<div class="card mb-3">{{ $project->title }}</div>
 			<div class="card mb-3">{{ $project->title }}</div>
 			<div class="card mb-3">{{ $project->title }}</div>
 			<div class="card mb-3">{{ $project->title }}</div>
 			<div class="card mb-3">{{ $project->title }}</div>

 			<h3 class="text-gray-400 font-normal pr-4 mt-6 mb-3">General Notes </h3>
 			<textarea class="card mb-3 w-full h-32"></textarea>
 		</div>
 		<div class="w-1/4">
 			@include('partials.card')
 		</div>
 	</div>
 </main>
 @endsection
