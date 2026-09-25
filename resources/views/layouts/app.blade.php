<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
        <div class="min-h-screen bg-slate-100">
            <header class="border-b border-emerald-700 bg-emerald-700 text-white shadow-lg shadow-emerald-200/40">
                <div class="mx-auto max-w-[1600px] px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-base font-bold text-white ring-1 ring-white/20">
                            R
                        </div>
                        <div class="text-xl font-semibold tracking-tight text-white">Roro Task Manager</div>
                    </div>
                </div>
            </header>

            <div class="mx-auto max-w-[1600px] px-4 py-4 lg:px-6">
                <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_24px_60px_rgba(15,23,42,0.08)] ring-1 ring-slate-100 lg:grid lg:grid-cols-[260px_minmax(0,1fr)]">
                    <aside class="border-b border-slate-200 bg-slate-50/90 p-5 lg:border-b-0 lg:border-r">
                        <nav class="space-y-2">
                            <a href="{{ route('tasks.index') }}" class="flex items-center justify-between rounded-2xl bg-emerald-50 px-3 py-2.5 text-sm font-medium text-emerald-800 ring-1 ring-emerald-200">
                                <span>Dashboard</span>
                            </a>
                            <a href="{{ route('tasks.index') }}" class="flex items-center justify-between rounded-2xl px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                                <span>All Tasks</span>
                                <span class="text-xs text-slate-400">{{ ($tasks ?? collect())->count() }}</span>
                            </a>
                        </nav>
                    </aside>

                    <div class="flex min-h-[820px] flex-col bg-white">
                        <div class="flex justify-end border-b border-slate-200 px-5 py-4 sm:px-6 lg:px-8">
                            <a href="{{ route('tasks.create') }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                + Add Task
                            </a>
                        </div>

                        <main class="flex-1 px-5 py-6 sm:px-6 lg:px-8">
                            @if (session('success'))
                                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 shadow-sm shadow-emerald-100">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
