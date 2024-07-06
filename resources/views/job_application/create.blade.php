<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show',['job'=>$job]),
        'apply'=>'#']" />
    <x-job-card :$job></x-job-card>
    <x-card >
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>

        <form action="{{ route('jobs.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <x-label for="expected_salary" require='{{true}}'
                >Expected Salary</x-label>
              <x-text-input type="number" name="expected_salary" />
            </div>

            <div class="mb-4">
                <x-label for="cv" require='{{true}}'
                  >Upload your CV</x-label>
                <x-text-input type="file" name="cv" />
              </div>

            <x-bottun class="w-full">Apply</x-bottun>
        </form>
    </x-card>
</x-layout>
