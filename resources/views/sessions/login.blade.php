<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl"> Log In!</h1>
            <form action="/login" method="POST">
                @csrf
                {{-- Email --}}
                <x-form.input name="email"  type="email"/>
                {{-- Password --}}
                <x-form.input name="password"  type="password"/>
                {{-- Submit Button --}}
                <div class="mb-6">
                   <x-form.button>Log In</x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
