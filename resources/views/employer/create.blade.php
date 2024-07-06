<x-layout>
    <x-card>
        <h2 class="mb-4 text-lg font-medium text-center">
            Create your employer account
        </h2>

        <form action="{{route('employer.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" require={{true}}>Company name</x-label>
                <x-text-input name="company_name"/>
            </div>

            <x-bottun class="w-full">Create</x-bottun>
        </form>
    </x-card>
</x-layout>
