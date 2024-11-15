<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('participant.store') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('名字')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <small class="text-gray-500">請僅輸入名字，不含姓氏。</small>
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('姓氏')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Organization -->
        <div class="mt-4">
            <x-input-label for="organization" :value="__('工作機構 (Optional)')" />
            <x-text-input id="organization" class="block mt-1 w-full" type="text" name="organization" :value="old('organization')" />
            <x-input-error :messages="$errors->get('organization')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('電子郵件地址')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number (Optional) -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('聯絡電話 (Optional)')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Membership of Nuclear Medicine Society -->
        <div class="mt-4">
            <x-input-label for="is_nuclear_medicine_member" :value="__('是否澳門核醫及分子影像學會會員?')" />
            
            <div class="mt-2">
                <label class="inline-flex items-center text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="is_nuclear_medicine_member" value="1" class="form-radio text-indigo-600" required>
                    <span class="ml-3">是</span>
                </label>
                <br>
                <label class="inline-flex items-center mt-2 text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="is_nuclear_medicine_member" value="0" class="form-radio text-red-600" required>
                    <span class="ml-3">否</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('is_nuclear_medicine_member')" class="mt-2" />
        </div>

        <!-- Occupation Category -->
        <div class="mt-4">
            <x-input-label for="occupation_category" :value="__('職業類別 (Optional)')" />
            <x-text-input id="occupation_category" class="block mt-1 w-full" type="text" name="occupation_category" :value="old('occupation_category')" />
            <x-input-error :messages="$errors->get('occupation_category')" class="mt-2" />
        </div>

        <!-- License Number -->
        <div class="mt-4">
            <x-input-label for="license_number" :value="__('執照編號 (Optional)')" />
            <x-text-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')"/>
            <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
        </div>

        <!-- Membership of Medical Specialists -->
        <div class="mt-4">
            <x-input-label for="is_medical_specialist_member" :value="__('是否澳門醫學専科院土?')" />
            <div class="mt-2">
                <label class="inline-flex items-center text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="is_medical_specialist_member" value="1" class="form-radio text-indigo-600" required>
                    <span class="ml-3">是</span>
                </label>
                <br>
                <label class="inline-flex items-center mt-2 text-lg text-gray-800 dark:text-gray-200">
                    <input type="radio" name="is_medical_specialist_member" value="0" class="form-radio text-red-600" required>
                    <span class="ml-3">否</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('is_medical_specialist_member')" class="mt-2" />
        </div>

        <!-- Work Registration Number -->
        <div class="mt-4">
            <x-input-label for="work_registration_number" :value="__('單位工作登編號 (Optional)')" />
            <x-text-input id="work_registration_number" class="block mt-1 w-full" type="text" name="work_registration_number" :value="old('work_registration_number')"/>
            <x-input-error :messages="$errors->get('work_registration_number')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('提交') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
