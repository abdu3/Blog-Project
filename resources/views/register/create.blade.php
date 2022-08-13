<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form action="/register" method="POST">
                @csrf
                {{-- name --}}
                <x-form.input name="name" />
                {{-- Email --}}
                <x-form.input name="email"  type="email"/>
                {{-- Password --}}
                <x-form.input name="password"  type="password"/>
                {{-- Submit Button --}}
                <div class="mb-6">
                    <x-form.button>Register</x-form.button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
