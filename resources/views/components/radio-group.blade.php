<label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio" name="{{ $name }}" value=""  @checked(!request($name))/>
    <span class="ml-2">All</span>
</label>
@foreach ($values as $value)
    <label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio" name="{{ $name }}" value="{{$value}}" @checked(request($name) == $value)>
    <span class="ml-2">{{ Str::ucfirst($value) }}</span>
</label>
@endforeach