@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-rgb(17, 138, 178) focus:ring-rgb(17, 138, 178) rounded-md shadow-sm']) !!}>
