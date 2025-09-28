<x-layouts.auth-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    <div>
        <section class="min-h-screen flex box-border justify-center items-center">
            <div class="bg-bsu-green rounded-2xl flex max-w-3xl p-5 items-center">
                <div class="md:w-1/2 px-8">
                    <h2 class="font-bold text-3xl text-white">Login</h2>
                    <p class="text-sm mt-4 text-white">Login to your BSU Account</p>

                    <form action="/login" method="POST" class="flex flex-col gap-4 text-white">
                        @csrf
                        <!-- Email -->
                        <div class="relative w-full">
                            <label for="email" class="block mb-1 font-medium">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200 @error('email') input-error @enderror">
                        </div>

                        @error('email')
                            <div class="label text-sm">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password -->
                        <div class="relative w-full mt-4">
                            <label for="password" class="block mb-1 font-medium">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200 @error('password') input-error @enderror">
                                <!-- Eye toggle icon -->
                                <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-bsu-yellow cursor-pointer hover:scale-110 duration-300"
                                    data-toggle="password" data-target="password"></i>
                            </div>
                        </div>

                        @error('password')
                            <div class="label text-sm">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <button class="bg-bsu-yellow text-white py-2 rounded-xl hover:scale-105 duration-300 font-medium" type="submit">
                            Login
                        </button>
                    </form>

                    <div class="mt-4 text-sm flex justify-between items-center container-mr">
                        <p class="mr-3 md:mr-0 text-bsu-yellow font-bold">If you don't have an account..</p>
                        <a href="{{ route('register') }}"
                            class="register text-white bg-bsu-yellow rounded-xl py-2 px-5 hover:scale-110 font-semibold duration-300">Register</a>
                    </div>
                </div>
                <div class="md:block hidden w-1/2">
                    <img class="rounded-2xl h-3/4" src="{{ asset('img/BSU-BOKOD.jpg') }}" alt="BSU BOKOD">
                </div>
            </div>
        </section>
    </div>

</x-layouts.auth-layout>
