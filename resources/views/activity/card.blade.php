<div class="card mt-4">
    <ul>
        @foreach($project->activity as $activity)
            <li>
                @include('activity.'. $activity->description)
                <span class="text-gray-400 text-sm">{{ $activity->created_at->diffForHumans(null, true) }}</span>
            </li>
        @endforeach
    </ul>
</div>
