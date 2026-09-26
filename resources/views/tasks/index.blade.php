<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Task Manager</title>

    @vite(['resources/css/app.css'])

</head>

<body>

    <div class="page-container">

        <!-- Header -->

        <header class="main-header">

            <div>

                <h1>My Task Manager</h1>

                <p>Keep track of your daily tasks.</p>

            </div>

            <a href="{{ route('tasks.create') }}" class="add-task-button">
                + Add Task
            </a>

        </header>


        <!-- Success Message -->

        @if (session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif


        <!-- Task List -->

        <section class="tasks-section">

            <div class="section-title">

                <h2>My Tasks</h2>

                <span>
                    {{ $tasks->count() }} task(s)
                </span>

            </div>


            @if ($tasks->count() > 0)

                @foreach ($tasks as $task)

                    <div class="task-card">

                        <div class="task-info">

                            <div class="task-title">

                                <h3>
                                    {{ $task->task_name }}
                                </h3>


                                @if ($task->status === 'Completed')

                                    <span class="status completed">
                                        Completed
                                    </span>

                                @else

                                    <span class="status pending">
                                        Pending
                                    </span>

                                @endif

                            </div>


                            @if ($task->description)

                                <p class="task-description">
                                    {{ $task->description }}
                                </p>

                            @endif


                            @if ($task->due_date)

                                <p class="task-date">
                                    Due:
                                    {{ $task->due_date->format('F d, Y') }}
                                </p>

                            @endif

                        </div>


                        <!-- Buttons -->

                        <div class="task-actions">

                            <a
                                href="{{ route('tasks.edit', $task->id) }}"
                                class="button edit-button"
                            >
                                Edit
                            </a>


                            @if ($task->status === 'Pending')

                                <form
                                    action="{{ route('tasks.status', $task->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Completed"
                                    >

                                    <button
                                        type="submit"
                                        class="button complete-button"
                                    >
                                        Complete
                                    </button>

                                </form>

                            @else

                                <form
                                    action="{{ route('tasks.status', $task->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Pending"
                                    >

                                    <button
                                        type="submit"
                                        class="button pending-button"
                                    >
                                        Mark Pending
                                    </button>

                                </form>

                            @endif


                            <form
                                action="{{ route('tasks.destroy', $task->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this task?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="button delete-button"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach


            @else

                <div class="empty-message">

                    <h2>No Tasks Yet</h2>

                    <p>
                        You don't have any tasks yet.
                    </p>

                    <a
                        href="{{ route('tasks.create') }}"
                        class="add-task-button"
                    >
                        + Add Your First Task
                    </a>

                </div>

            @endif

        </section>

    </div>

</body>

</html>
