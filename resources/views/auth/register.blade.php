<title>Clinic</title>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <img src="img/logoclinic.PNG" alt="Girl in a jacket" width="150" height="100">
        </x-slot>

        <p class="text-center font-weight-bold">ลงทะเบียนคนไข้</p>
        <br>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('ชื่อ') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('เบอร์โทรศัพท์') }}" />
                <x-jet-input id="users_phone" class="block mt-1 w-full" type="text" name="users_phone"
                    :value="old('users_phone')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="idcard" value="{{ __('เลขบัตรประจำตัวประชาชน') }}" />
                <x-jet-input id="users_idcard" class="block mt-1 w-full" type="text" name="users_idcard"
                    :value="old('users_idcard')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('อีเมล') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('รหัสผ่าน') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('ยืนยันรหัสผ่าน') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('ลงทะเบียนเรียบร้อยแล้ว?') }}
                    {{-- {{ __('Already registered?') }} --}}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('ลงทะเบียน') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
