@props(['route', 'label'])

@php
  $isActive = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}" 
   {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 text-sm font-semibold transition-colors ' . ($isActive ? 'text-[#0B3A75] border-b-2 border-[#1E9BE8] font-bold' : 'text-slate-700 hover:text-[#0B3A75] border-b-2 border-transparent')]) }}
   {{ $isActive ? 'aria-current=page' : '' }}>
  {{ $label }}
</a>
