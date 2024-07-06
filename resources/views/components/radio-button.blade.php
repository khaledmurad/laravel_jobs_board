<div>
    @if ($allOptions)
        <label for="{{$name}}" class="mb-1 flex items-center">
            <input type="radio" name="{{$name}}" value="" @checked(!request('{{$name}}'))>
            <span class="ml-2">All</span>
        </label>
    @endif

    @foreach ($options as $option)
        <label for="{{$name}}" class="mb-1 flex items-center">
            <input type="radio" name="{{$name}}" value="{{$option}}"
            @checked("$option" === ($value ?? request("$name")))>
            <span class="ml-2">{{Str::ucfirst($option)}}</span>
        </label>
    @endforeach

    @error($name)
        <div class="text-xs text-red-600 mt-1">
            {{$message}}
        </div>
    @enderror
</div>
