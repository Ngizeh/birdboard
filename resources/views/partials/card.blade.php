<div class="card">
	<div class="border-l-4 border-blue-300 -ml-5 py-3">
		<a class="font-normal text-xl py-4 ml-6" href="{{ route('projects.show', $project->id) }}">
			{{ Str::limit($project->title, 10) }}
		</a>
	</div>
	<div class="text-gray-400 py-5">{{ Str::limit($project->description, 100)}}</div>
    <div class="text-right">
        <form action="{{ route('projects.destroy', $project) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="bg-red-600 py-2 px-6 font-bold text-white rounded">Delete</button>
        </form>
    </div>
</div>
