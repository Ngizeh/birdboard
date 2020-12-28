@extends('layouts.app')

@section('content')

    <header>
        <div class="flex justify-between items-center py-4">
            <h3 class="text-gray-400 font-normal pr-4"><a href="{{ route('projects.index') }}">My Projects</a>
                / {{ $project->title}} </h3>
            <a href="{{ route('projects.edit', $project) }}" class="button">Edit Task</a>
        </div>
    </header>

    <main>
        <div class="flex">
            <div class="w-3/4 mr-8">
                @foreach ($project->tasks as $task)
                    <form action="{{ $project->path() .'/tasks/' . $task->id }}" method="post" class="card mb-3">
                        @method('PATCH')
                        @csrf
                        <div class="flex items-center">
                            <input type="text" name="body" class="w-full {{ $task->completed ? 'text-gray-300' : '' }}"
                                   value="{{ $task->body }}">
                            <input type="checkbox" name="completed"
                                   onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        </div>
                    </form>
                @endforeach
                <form action="{{ route('tasks.store', $project->id) }}" method="post">
                    @csrf
                    <input class="card mb-3 w-full py-4" placeholder="Begin to add task ...." name="body">
                </form>

                <h3 class="text-gray-400 font-normal pr-4 mt-6 mb-3">General Notes </h3>
                <form action="{{ route('projects.update', $project) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <textarea class="card mb-3 w-full h-64" placeholder="Have additional notes ?"
                              name="notes">{{ $project->notes }}</textarea>
                    <button class="button" type="submit">
                        Add Notes
                    </button>
                </form>
                @error('notes')
                <span class="text-red-500 mt-5" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="w-1/4">
                @include('partials.card')
                <div class="card mt-4">
                    <ul>
                        @foreach($project->activity as $activity)
                            @if($activity->activity === 'created')
                                <li>You create a project</li>
                            @elseif($activity->activity === 'completed_task')
                                <li>You completed a task</li>
                            @elseif($activity->activity === 'updated')
                                <li>You updated a project</li>
                            @elseif($activity->activity === 'incomplete_task')
                                <li>You marked a task as in complete</li>
                            @elseif($activity->activity === 'deleted_task')
                                <li>You deleted a task</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
