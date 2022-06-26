@props(['status' => 'info'])

@php
    if(session('status') === 'info'){ $bgColor = 'bg-blue-300';}
    if(session('status') === 'alert'){ $bgColor = 'bg-red-300';}
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} w-1/2 mx-auto p-2 mb-5 text-white text-xs md:text-base">
        <p class="mx-auto">{{ session('message') }}</p>
    </div>
@endif
