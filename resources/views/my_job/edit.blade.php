<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My jobs' => route('my-job.index'),'Edit' => '#']" />

    <x-card class="mb-4">
        <form action="{{route('my-job.update',['my_job' => $job])}}" method="post">
             @csrf
             @method('PUT')
             <div class="grid grid-cols-2 gap-4 mb-4">
                 <div >
                     <x-label for="title" require="{{true}}">Title</x-label>
                     <x-text-input name="title" value="{{$job->title}}" />
                 </div>

                 <div >
                     <x-label for="city" require="{{true}}">Location</x-label>
                     <x-text-input name="city" :value="$job->city"/>
                 </div>

                 <div class="col-span-2">
                     <x-label for="salary" require="{{true}}">Salary</x-label>
                     <x-text-input name="salary" type="number" :value="$job->salary"/>
                 </div>

                 <div class="col-span-2">
                     <x-label for="description" require="{{true}}">Description </x-label>
                     <x-text-input name="description" type="textarea" :value="$job->description"/>
                 </div>

                 <div >
                     <x-label for="experince" require="{{true}}">Experince</x-label>
                     <x-radio-button name="experince" allOptions={{false}} :options="\App\Models\Job::$exp"
                     :value="$job->experince"
                     />
                 </div>

                 <div >
                     <x-label for="category" require="{{true}}">Category</x-label>
                     <x-radio-button name="category" allOptions={{false}} :options="\App\Models\Job::$category"
                     value="{{$job->category}}"
                     />
                 </div>
             </div>

             <div class="col-span-2">
                 <x-bottun class="w-full">Edit job</x-bottun>
             </div>
         </form>
     </x-card>
</x-layout>
