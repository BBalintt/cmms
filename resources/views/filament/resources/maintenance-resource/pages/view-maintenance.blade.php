<x-filament::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Karbantartás részletei</h2>

        <div><strong>Eszköz:</strong> {{ $record->device->name ?? '–' }}</div>
        <div><strong>Leírás:</strong> {{ $record->description }}</div>
        <div><strong>Ütemezett idő:</strong> {{ $record->scheduled_at }}</div>
        <div><strong>Létrehozva:</strong> {{ $record->created_at }}</div>

        @if ($record->attachments && count($record->attachments))
            <div>
                <strong>Mellékletek:</strong>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($record->attachments as $file)
                        <li>
                            <a href="{{ Storage::url($file) }}" target="_blank" class="text-blue-600 underline">
                                {{ basename($file) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-filament::page>
