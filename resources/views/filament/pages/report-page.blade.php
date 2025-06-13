@php
    $events = \App\Models\Maintenance::query()
        ->get()
        ->map(fn($item) => [
            'title' => $item->description ?? 'Karbantartás',
            'start' => $item->scheduled_at ?? $item->created_at,
            'url' => route('filament.admin.resources.maintenances.view', $item),
        ]);
@endphp

<x-filament::page>
    <x-filament::button
        tag="a"
        href="{{ route('calendar.export') }}"
        target="_blank"
        color="gray"
    >
        PDF Export
    </x-filament::button>

    <div id="calendar"></div>

    <style>
        #calendar {
            min-height: 600px;
            margin-top: 2rem;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
                locale: 'hu',
            });

            calendar.render();
        });
    </script>
</x-filament::page>
