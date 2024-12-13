<x-layout>
<div class="flex w-full my-48">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 my-5">
       Name: {{ $user->name }}
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 my-5">
        Email:  {{ $user->email }}
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 my-5">
        <x-buttons.subscribe-button :user="$user" />
    </div>
</div>
</x-layout>
