<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My jobs' => '#']" />

    <div class="mb-4 text-right">
         <x-link-buton href="{{route('my-job.create')}}">Add job</x-link-buton>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :$job>
            @forelse ($job->jobApplication as $application)
                <div class="flex justify-between mb-4 text-sm text-slate-500 items-center">
                    <div>
                        <div>{{$application->user->name}}</div>
                        <div> {{$application->created_at->diffForHumans()}} </div>
                        <div>Download CV</div>
                    </div>
                    <div>
                        <div>${{$application->expected_salary}}</div>
                    </div>
                </div>
            @empty
                <div class="text-sm text-slate-500 mb-4">No applications yet</div>
            @endforelse

            <div class="flex space-x-2">
                <x-link-buton href="{{route('my-job.edit',$job)}}">
                    Edit
                </x-link-buton>

                <form action="{{route('my-job.destroy',$job)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-bottun>Delete</x-bottun>
                </form>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed text-center border-slate-500 p-8">
            <div>No jobs yet</div>
            <div>
                Create your first job <a class="text-blue-600 hover:underline"
                href="{{route('my-job.create')}}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
