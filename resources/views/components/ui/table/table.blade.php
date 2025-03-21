@props([
    'headers' => [],
    'tb_id' => ''
])
<div class="overflow-x-auto py-2">
    <table class="w-full overflow-x-scroll whitespace-nowrap rounded-lg border border-gray-200 bg-white shadow-md">
        <thead>
            <tr class="bg-purple-600 text-white">
                @foreach ($headers as $header)
                    <th
                        class="{{ $loop->first ? 'text-center' : 'text-left' }} {{ $loop->last ? 'text-center' : 'text-left' }} border border-white px-4 py-2 text-sm font-medium">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200" id="{{ $tb_id }}">
            {{ $slot }}
        </tbody>
    </table>
</div>
