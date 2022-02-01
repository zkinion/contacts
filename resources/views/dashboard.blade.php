<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} -- Friends List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb4">Contacts</h1>

                    <a href="/add_new_contact">
                        <img src="/images/add_new.png" class="add_new_image" />
                    </a>
                    @foreach($contacts as $contact)
                            <div class="pa2 mb3 striped--near-white">
                                <header class="b mb2 edit_contact_link">

                                    <a href="/edit_contact/{{$contact->id}}">
                                        {{ $contact->name }}
                                    </a>
                                    <span class="delete_icon_span" data-id="{{ $contact->id }}" data-name="{{ $contact->name }}">
                                        <img src="/images/delete_icon.png" class="delete_icon" />
                                    </span>
                                </header>

                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        $( document ).ready(function() {

            jQuery('.delete_icon_span').on('click', function (e) {
                e.preventDefault();

                let that = $(this);
                let contact_id = that.data('id');
                let contact_name = that.data('name');

                Swal.fire({
                    title: 'Caution!',
                    text: 'Are you sure you want to delete your contact: ' + contact_name + '?',
                    icon: 'error',
                    confirmButtonText: 'Yes',
                    denyButtonText: 'Cancel',
                    showDenyButton: true,
                }).then(function (isConfirm) {
                    //console.warn(isConfirm);
                    if (isConfirm.value == true) {
                        let url = "/delete_contact/" + contact_id;
                        window.location.href = url;
                    } else {
                        //swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });

        });


    </script>
</x-app-layout>
