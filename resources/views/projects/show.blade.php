 @extends('layouts.app')

 @section('content')

 <h3>{{ $project->title }}</h3>
 <div>{{ $project->description }}</div>
 <a href="{{ route('projects.index') }}">Back</a>

 @endsection
