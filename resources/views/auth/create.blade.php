<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{route('auth.store')}}" method="post">
            @csrf
            <div class="mb-8">
                <x-label for="email" require='{{true}}'>Email</x-label>
                <x-text-input name="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" require='{{true}}'>Password</x-label>
                <x-text-input name="password" type="password" />
                @if (session('error'))
                    <div class="text-sm text-red-600 mt-2">
                        {{session('error')}}
                    </div>
                @endif
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                    <label for="remember">Remember me</label>
                </div>

                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forget Password!</a>
                </div>
            </div>
            <x-bottun class="w-full">
                Login
            </x-bottun>
        </form>
    </x-card>
</x-layout>
