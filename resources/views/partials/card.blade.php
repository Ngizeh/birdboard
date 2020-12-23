<div class="card">
	<div class="border-l-4 border-blue-300 -ml-5 py-3">
		<a class="font-normal text-xl py-4 ml-6" href="{{ route('projects.show', $project->id) }}">
			{{ str_limit($project->title, 10) }}
		</a>
	</div>
	<div class="text-gray-400 py-5">{{ str_limit($project->description, 100)}}</div>
</div>