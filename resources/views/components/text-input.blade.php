<div>

    @if ('textarea' != $type)
        <input type="{{$type}}" placeholder="{{ $placeholder }}"
             name="{{ $name }}" value="{{ old($name , $value) }}" id="{{ $name }}"
        @class([
            'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
            'ring-slate-300' => !$errors->has($name),
            'ring-red-600' => $errors->has($name)
        ])/>
    @else
        <textarea name="{{$name}}" id="{{$name}}"
        @class([
            'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
            'ring-slate-300' => !$errors->has($name),
            'ring-red-600' => $errors->has($name)
        ])>
            {{ old($name , $value) }}
        </textarea>
    @endif


    @error($name)
        <div class="text-xs text-red-600 mt-1">
            {{$message}}
        </div>
    @enderror
</div>
