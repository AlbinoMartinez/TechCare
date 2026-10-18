@props(['amount', 'note' => null, 'class' => ''])

<span class="font-mono tabular-nums tracking-tight {{ $class }}">Rp{{ number_format((int) $amount, 0, ',', '.') }}@if($note)<span class="text-xs font-sans font-normal text-slate-500 ml-1">{{ $note }}</span>@endif</span>
