 @extends('layouts.app')

 @section('content')
 <div class="flex justify-between items-end mb-3 py-6 ">
 	<h3 class="text-gray-500">My Projects</h3>
 	<a href="{{ route('projects.create') }}" class="bg-blue-400 py-3 px-6 rounded-lg text-white">Add Project</a>
 </div>
 <div class="grid grid-cols-1 md:grid md:grid-cols-2 lg:grid lg:grid-cols-3 gap-4">
 	@forelse ($projects as $project)
 	  @include('partials.card')
 	@empty
 	<div>You don't have projects yet</div>
 	@endforelse
 </div>

 @endsection
