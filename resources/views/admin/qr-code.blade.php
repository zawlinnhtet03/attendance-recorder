<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Check-in QR Code') }}
        </h2>
    </x-slot>

    <!-- Centering QR Code -->
    <div class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="text-center bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            <!-- Display the QR Code -->
            <div class="mx-auto">
                {!! $qrCode !!}
            </div>
        </div>
    </div>
</x-app-layout>
