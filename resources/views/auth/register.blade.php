<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Start Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- End Phone Number -->

        <!-- Start Age -->
        <div class="mt-4" id="age_section">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
        <!-- End Age -->

        <!-- Start Twitter_account_link -->
        <div class="mt-4" id="twitter_link_section">
            <x-input-label for="twitter_link" :value="__('Twitter Account Link')" />
            <x-text-input id="twitter_link" class="block mt-1 w-full" type="text" name="twitter_link" :value="old('twitter_link')" required />
            <x-input-error :messages="$errors->get('twitter_link')" class="mt-2" />
        </div>
        <!-- End Twitter_account_link -->

        <!-- Start Sections Select -->
        <div class="mt-4" id="sections_selected_section">
            <x-input-label for="user_type" :value="__('Section')" />
            <select class="form-select block w-full mt-1" name="section_id" id="type">
                <optgroup label="المجالات">
                    <option value="">اختر المجال</option>
                    @forelse ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @empty
                        <option value="">لا يوجد مجالات</option>
                    @endforelse
                </optgroup>
            </select>
        </div>
        <!-- End Sections Select -->

        <!-- Start User Type -->
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('User Type')" />
            <select class="form-select block w-full mt-1" name="type" id="type">
                <option>اختر نوع المستخدم</option>
                <option value="Publisher">ناشر</option>
                <option value="User">مستخدم</option>
            </select>
        </div>
        <!-- End User Type -->

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
        
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
        
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required />
        
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>