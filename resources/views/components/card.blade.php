{{-- we use the $attributes->mere to merge the attributes given at the other views to merge with 
    the present components attributes --}}

    {{-- we can alternatively use the $attributes->class(['']) and define the same as below --}}

<div 
{{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-white p-4 shadow-sm'])}}>
    {{ $slot }}
</div>