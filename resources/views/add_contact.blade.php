<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Contact') }} -- Friends List
        </h2>
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/save_contact" id="save_contact_form">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="phone" :value="__('Phone Number')" />

                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" />
                </div>

                <div class="mt-4">

                    <x-label for="address" :value="__('Address')" />
                    <textarea name="address" cols="20" rows="6"></textarea>
                </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" id="create_contact_button">
                    {{ __('Create New Contact') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        jQuery( document ).ready(function() {

            jQuery('#create_contact_button').on('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Caution!',
                    text: 'Are you sure you want to save this contact?',
                    icon: 'error',
                    confirmButtonText: 'Yes',
                    denyButtonText: 'Cancel',
                    showDenyButton: true,
                }).then(function (isConfirm) {
                    //console.warn(isConfirm);
                    if (isConfirm.value == true) {
                        jQuery('#save_contact_form').submit();
                    } else {
                        //swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });

        });


    </script>


</x-app-layout>
