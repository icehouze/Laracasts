@extends ('layouts.master')
@section ('meta-title')All Tasks
@endsection

@section ('content')
    <ul>
    	@foreach ($tasks as $task)
    		<li>
                <a href="/tasks/{{ $task->id }}">{{ $task->body }}</a>
            </li>
    	@endforeach
    </ul>

    <div class="sidebar-module">
		  <a class="btn btn-primary" href="/tasks/create">Add New Task</a>
  	</div>
@endsection