@extends('layouts.app')

@section('title', 'Task Dashboard')

@section('content')
    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-100">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-500">Total Tasks</p>
                    <span class="rounded-full bg-slate-100 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">All</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['total'] }}</p>
            </div>
            <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5 shadow-sm shadow-emerald-100">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-emerald-700">Pending</p>
                    <span class="rounded-full bg-emerald-600 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">Open</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-emerald-900">{{ $stats['pending'] }}</p>
            </div>
            <div class="rounded-2xl border border-cyan-100 bg-cyan-50 p-5 shadow-sm shadow-cyan-100">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-cyan-700">Completed</p>
                    <span class="rounded-full bg-cyan-600 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">Done</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-cyan-900">{{ $stats['completed'] }}</p>
            </div>
            <div class="rounded-2xl border border-amber-100 bg-amber-50 p-5 shadow-sm shadow-amber-100">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-amber-700">Overdue</p>
                    <span class="rounded-full bg-amber-500 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">Alert</span>
                </div>
                <p class="mt-4 text-3xl font-bold text-amber-900">{{ $stats['overdue'] }}</p>
            </div>
        </div>

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-100">
            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Recent Tasks</h2>
                <span class="text-xs font-medium uppercase tracking-[0.2em] text-slate-500">{{ count($tasks) }} items</span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50 text-[10px] uppercase tracking-[0.2em] text-slate-500">
                        <tr>
                            <th class="px-5 py-4 font-medium">Task</th>
                            <th class="px-5 py-4 font-medium">Description</th>
                            <th class="px-5 py-4 font-medium">Due Date</th>
                            <th class="px-5 py-4 font-medium">Status</th>
                            <th class="px-5 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse ($tasks as $task)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-slate-900">{{ $task->task_name }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="max-w-md text-sm text-slate-600">
                                        {{ $task->description ?: 'No description provided.' }}
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex rounded-full border border-slate-200 bg-slate-100 px-2.5 py-1 text-xs text-slate-700">
                                        {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No due date' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    @if ($task->status === 'completed')
                                        <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                                            Completed
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-medium text-amber-700">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('tasks.edit', $task) }}" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 transition hover:border-slate-300 hover:text-slate-900">
                                            Edit
                                        </a>

                                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="{{ $task->status === 'completed' ? 'pending' : 'completed' }}">
                                            <button type="submit" class="rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-medium text-emerald-700 transition hover:bg-emerald-100">
                                                {{ $task->status === 'completed' ? 'Mark Pending' : 'Mark Complete' }}
                                            </button>
                                        </form>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-700 transition hover:bg-rose-100">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center text-slate-500">
                                    <div class="mx-auto max-w-md rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-6">
                                        <p class="text-lg font-semibold text-slate-700">No tasks yet</p>
                                        <p class="mt-2 text-sm text-slate-500">Start by creating your first task and keep your day organized.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
