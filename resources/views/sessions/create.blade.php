<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>

                <h1 class="text-center font-bold text-xl">Login!</h1>
                
                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    
                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password"/>

                {{-- <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    
                    <input class="border border-gray-400 p-2 w-full"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        >
                        
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    
                    {{-- <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password">
                        Password
                    </label>
                    
                    <input class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    id="password"
                    required
                    autocomplete="new-password"
                    >
                </div> --}}
                
                <x-form.button>Log In</x-form.button>
            </form>
        </x-panel>
        </main>
    </section>
</x-layout>