<label for="{{ $for }}"
class="mb-2 text-slate-900 text-sm block font-medium">
    {{ $slot }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>