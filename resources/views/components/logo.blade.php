@props(['size' => 44, 'class' => ''])

<img src="{{ asset('images/techcare-logo.png') }}" 
     alt="TechCare IT Support & Maintenance" 
     class="{{ $class }} object-contain" 
     style="height: {{ $size }}px; width: auto;" 
     loading="eager" />
