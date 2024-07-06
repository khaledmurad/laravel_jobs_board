<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My jobs' => route('my-job.index'), 'Create' => '#']" />

    <x-card class="mb-4">
       <form action="{{route('my-job.store')}}" method="post">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div >
                    <x-label for="title" require="{{true}}">Title</x-label>
                    <x-text-input name="title"/>
                </div>

                <div >
                    <x-label for="city" require="{{true}}">Location</x-label>
                    <x-text-input name="city"/>
                </div>

                <div class="col-span-2">
                    <x-label for="salary" require="{{true}}">Salary</x-label>
                    <x-text-input name="salary" type="number"/>
                </div>

                <div class="col-span-2">
                    <x-label for="description" require="{{true}}">Description </x-label>
                    <x-text-input name="description" type="textarea"/>
                </div>

                <div >
                    <x-label for="experince" require="{{true}}">Experince</x-label>
                    <x-radio-button name="experince" allOptions={{false}} :options="\App\Models\Job::$exp"
                    value="{{old('experince')}}"
                    />
                </div>

                <div >
                    <x-label for="category" require="{{true}}">Category</x-label>
                    <x-radio-button name="category" allOptions={{false}} :options="\App\Models\Job::$category"
                    value="{{old('category')}}"
                    />
                </div>
            </div>

            <div class="col-span-2">
                <x-bottun class="w-full">Create job</x-bottun>
            </div>
        </form>
    </x-card>
</x-layout>
