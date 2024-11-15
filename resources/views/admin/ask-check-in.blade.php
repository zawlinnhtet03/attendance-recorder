<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('participant.checkInOrCheckOut') }}">
        @csrf

        <!-- Check-in Status Question -->
        <div class="mt-4">
            <x-input-label for="check_in_status" :value="__('您是否已經報到？')"/>
            
            <div class="mt-4">
                <label class="inline-flex items-center text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="check_in_status" value="yes" class="form-radio text-indigo-600" required>
                    <span class="ml-3">是的，我已經報到。</span>
                </label>
                <br>
                <label class="inline-flex items-center mt-4 text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="check_in_status" value="no" class="form-radio text-red-600" required>
                    <span class="ml-3">不，我還沒有報到。</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('check_in_status')" class="mt-2 text-red-400" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="text-lg">
                {{ __('提交') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
