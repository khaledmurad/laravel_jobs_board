<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="mb-4 flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{$application->created_at->diffForHumans()}}
                    </div>
                    @if (($application->job->job_application_count - 1) > 0)
                       <div>
                            Other {{Str::plural('applicant' , $application->job->job_application_count - 1)}}
                            {{ $application->job->job_application_count - 1 }}
                        </div>
                    @else
                        <div>
                            No other applicant
                        </div>
                    @endif
                    <div>
                        Your asking salary ${{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Average asking salary
                        ${{ number_format($application->job->job_application_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form action="{{route('my-job-application.destroy',
                     ['my_job_application'=>$application])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-bottun>Cancel</x-bottun>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No job application yet
            </div>
            <div class="text-center">
                find some jobs <a class="text-indigo-500 hover:underline"
                    href="{{ route('jobs.index') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
