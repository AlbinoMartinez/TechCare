@props(['route', 'label'])

@php
  $isActive = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}" 
   {{ $attributes->merge(['class' => 'inline-flex items-center px-3.5 py-2 text-xs sm:text-sm font-semibold transition-colors ' . ($isActive ? 'text-[#063970] border-b-2 border-[#0D9BE4] font-bold' : 'text-slate-600 hover:text-[#063970] border-b-2 border-transparent')]) }}
   {{ $isActive ? 'aria-current=page' : '' }}>
  {{ $label }}
</a>
