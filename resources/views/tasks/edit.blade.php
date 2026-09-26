<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task - My Task Manager</title>

    @vite(['resources/css/app.css'])

</head>

<body>

    <div class="page-container">

        <!-- Header -->

        <header class="main-header">

            <div>

                <h1>Edit Task</h1>

                <p>Update the information of your selected task.</p>

            </div>

            <a
                href="{{ route('tasks.index') }}"
                class="back-button"
            >
                ← Back to Tasks
            </a>

        </header>


        <!-- Form -->

        <section class="form-section">

            <h2>Task Information</h2>

            <p class="form-description">
                Change the details below and save your updates.
            </p>


            @if ($errors->any())

                <div class="error-message">

                    <strong>Please fix the following:</strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('tasks.update', $task->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- Task Name -->

                <div class="form-group">

                    <label for="task_name">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name', $task->task_name) }}"
                        placeholder="Enter your task name"
                        required
                    >

                </div>


                <!-- Description -->

                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter a description for your task..."
                    >{{ old('description', $task->description) }}</textarea>

                </div>


                <!-- Status -->

                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                    >

                        <option
                            value="Pending"
                            {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                    </select>

                </div>


                <!-- Due Date -->

                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                    >

                </div>


                <!-- Buttons -->

                <div class="form-buttons">

                    <a
                        href="{{ route('tasks.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="save-button"
                    >
                        Save Changes
                    </button>

                </div>

            </form>

        </section>

    </div>

</body>

</html>
