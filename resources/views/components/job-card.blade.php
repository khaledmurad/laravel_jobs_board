<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium">{{$job->title}}</h2>
        <div class="text-slate-500">
            ${{number_format($job->salary)}}
        </div>
    </div>
    <div class="flex justify-between items-center mb-4 text-sm text-slate-500">
        <div class="flex space-x-4 items-center">
            <div>{{$job->employer->company_name}}</div>
            <div>{{$job->city}}</div>
            @if ($job->deleted_at)
                <div class="text-red-600 text-xs"> Deleted </div>
            @endif
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{route('jobs.index',['experince'=>$job->experince])}}">
                    {{Str::ucfirst($job->experince)}}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{route('jobs.index',['category'=>$job->category])}}">
                    {{$job->category}}
                </a>
            </x-tag>
        </div>
    </div>

    {{$slot}}
</x-card>
