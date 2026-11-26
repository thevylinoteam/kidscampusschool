@php
    $staff = auth()->user();
    $quickActions = collect([
        ['allowed' => $staff->can('create', [\App\Models\User::class, 'student']), 'route' => 'students.create', 'title' => 'New admission', 'detail' => 'Register a child', 'icon' => 'user-plus'],
        ['allowed' => $staff->can('viewAny', [\App\Models\User::class, 'student']), 'route' => 'students.index', 'title' => 'Student records', 'detail' => 'Find a student', 'icon' => 'users'],
        ['allowed' => $staff->can('viewAny', \App\Models\FeeInvoice::class), 'route' => 'fee-invoices.index', 'title' => 'Fees and receipts', 'detail' => 'Find bills, collect fees and print receipts', 'icon' => 'receipt'],
        ['allowed' => $staff->can('create', \App\Models\FeeInvoice::class), 'route' => 'fee-invoices.create', 'title' => 'Create fee invoice', 'detail' => 'Prepare a new bill', 'icon' => 'file-plus'],
        ['allowed' => feature_enabled(\App\Enums\Feature::Attendance) && $staff->can('read attendance'), 'route' => 'attendance.register', 'title' => 'Attendance register', 'detail' => 'View or take attendance', 'icon' => 'clipboard-check'],
        ['allowed' => $staff->can('viewAny', \App\Models\ReportRun::class), 'route' => 'reports.index', 'title' => 'Reports and exports', 'detail' => 'Review school records', 'icon' => 'chart-column'],
    ])->where('allowed', true);
@endphp
@if (!$staff->isPortalOnly() && $quickActions->isNotEmpty())
    <section class="mb-8 space-y-4" aria-labelledby="daily-work-heading">
        <div class="rounded-xl border bg-card p-4 sm:p-6">
            <p class="text-sm font-medium text-muted-foreground">{{ config('app.name') }}</p>
            <h2 id="daily-work-heading" class="mt-1 text-xl font-semibold">Daily school work</h2>
            <p class="mt-1 text-sm text-muted-foreground">Working branch: {{ current_school()->name }}</p>
        </div>
        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
            @foreach ($quickActions as $action)
                <a href="{{ route($action['route']) }}" wire:navigate data-quick-action="{{ $action['route'] }}" class="flex min-h-24 items-start gap-3 rounded-xl border bg-card p-4 text-card-foreground transition-colors hover:bg-muted/50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring">
                    <span class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-muted text-foreground">
                        <x-icon :name="'lucide-'.$action['icon']" class="size-5" />
                    </span>
                    <span class="min-w-0">
                        <span class="block font-semibold">{{ $action['title'] }}</span>
                        <span class="mt-1 block text-sm text-muted-foreground">{{ $action['detail'] }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </section>
@endif
