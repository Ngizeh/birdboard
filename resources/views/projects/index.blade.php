 @extends('layouts.app')

 @section('content')
  <a href="{{ route('projects.create') }}">Create Project</a>
	<ul>
		@forelse ($projects as $project)
		<li>
			<a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
		</li>
		@empty
		 <p>You don't have projects yet</p>
		@endforelse
	</ul>


 @endsection
