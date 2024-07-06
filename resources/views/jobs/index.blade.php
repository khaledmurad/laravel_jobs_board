<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" method="GET">
            <div class="grid grid-cols-2 mb-4 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min-salary" value="{{request('min-salary')}}" placeholder="From" />
                        <x-text-input name="max-salary" value="{{request('max-salary')}}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experince</div>
                    <x-radio-button name="experince" :options="\App\Models\Job::$exp"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-button name="category" :options="\App\Models\Job::$category"/>
                </div>

            </div>
            <x-bottun class="w-full">Filter</x-bottun>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job >
            <x-link-buton :href="route('jobs.show' , ['job' => $job])">
                Show
            </x-link-buton>
        </x-job-card>
    @endforeach
</x-layout>
