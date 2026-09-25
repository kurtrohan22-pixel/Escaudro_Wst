@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-8 flex items-center justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-emerald-700">Create</p>
                <h1 class="mt-2 text-3xl font-bold text-emerald-800">Add New Task</h1>
            </div>
            <a href="{{ route('tasks.index') }}" class="rounded-xl border border-cyan-200 bg-cyan-50 px-4 py-2 text-sm font-medium text-cyan-800 transition hover:border-cyan-300 hover:bg-cyan-100">
                Back to Dashboard
            </a>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6 rounded-3xl border border-emerald-100 bg-white/80 p-6 shadow-xl shadow-emerald-100/60 backdrop-blur-sm sm:p-8">
            @csrf

            <div>
                <label for="task_name" class="mb-2 block text-sm font-medium text-slate-700">Task Name</label>
                <input id="task_name" name="task_name" type="text" value="{{ old('task_name') }}" class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/60 px-4 py-3 text-base text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100" placeholder="e.g. Finish project proposal" required>
                @error('task_name')
                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="mb-2 block text-sm font-medium text-slate-700">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/60 px-4 py-3 text-base text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100" placeholder="Add a few details about the task...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="status" class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                    <select id="status" name="status" class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/60 px-4 py-3 text-base text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100" required>
                        <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="due_date" class="mb-2 block text-sm font-medium text-slate-700">Due Date</label>
                    <input id="due_date" name="due_date" type="date" value="{{ old('due_date') }}" class="w-full rounded-2xl border border-emerald-200 bg-emerald-50/60 px-4 py-3 text-base text-slate-900 outline-none transition focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100">
                    @error('due_date')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('tasks.index') }}" class="rounded-xl border border-emerald-200 px-4 py-2.5 text-sm font-medium text-emerald-700 transition hover:border-emerald-300 hover:bg-emerald-50">
                    Cancel
                </a>
                <button type="submit" class="rounded-xl bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-200 transition hover:bg-emerald-800">
                    Save Task
                </button>
            </div>
        </form>
    </div>
@endsection
