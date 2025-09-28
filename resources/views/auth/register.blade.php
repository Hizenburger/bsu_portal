<x-layouts.auth-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <div>
        <section class="min-h-screen flex box-border justify-center items-center">
            <div class="bg-bsu-green rounded-2xl flex max-w-3xl p-5 items-center">
                <div class="md:w-1/2 px-8">
                    <h2 class="font-bold text-3xl text-white">Register</h2>
                    <div class="flex justify-center">
                        <p class="text-sm mt-4 text-white font-bold">Create your BSU Account</p>
                    </div>

                    <form action="/register" method="POST" class="flex flex-col gap-4 text-white mt-5">
                        @csrf
                        <div class="flex gap-4">
                            <!-- First Name -->
                            <div class="relative w-full">
                                <label for="first_name" class="block mb-1 font-medium">First Name</label>
                                <input type="text" name="first_name" id="first_name" placeholder="First Name"
                                    value="{{ old('first_name') }}"
                                    class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200">
                                @error('first_name')
                                    <div class="label mt-2 mb-2 text-sm">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="relative w-full">
                                <label for="last_name" class="block mb-1 font-medium">Last Name</label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name"
                                    value="{{ old('last_name') }}"
                                    class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200">
                                @error('last_name')
                                    <div class="label mt-2 mb-2 text-sm">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="relative w-full">
                            <label for="email" class="block mb-1 font-medium">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                value="{{ old('email') }}"
                                class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200">
                            @error('email')
                                <div class="label mt-2 mb-2 text-sm">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="relative w-full">
                            <label for="password" class="block mb-1 font-medium">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200">
                                <!-- Eye toggle icon -->
                                <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-bsu-yellow cursor-pointer hover:scale-110 duration-300"
                                    data-toggle="password" data-target="password"></i>
                            </div>
                            @error('password')
                                <div class="label mt-2 mb-2 text-sm">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </div>
                            @enderror

                            <label for="password_confirmation" class="block mb-1 font-medium">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Confirm Password"
                                    class="p-2 pr-10 rounded-xl border w-full focus:outline-yellow-200">
                                <!-- Eye toggle icon -->
                                <i class="fa-solid fa-eye absolute right-3 top-1/2 -translate-y-1/2 text-bsu-yellow cursor-pointer hover:scale-110 duration-300"
                                    data-toggle="password" data-target="password_confirmation"></i>
                            </div>

                        </div>

                        <button
                            class="bg-bsu-yellow text-white py-2 rounded-xl hover:scale-105 duration-300 font-medium"
                            type="submit">Register</button>
                    </form>

                    <div class="mt-4 text-sm flex justify-between items-center container-mr">
                        <p class="mr-3 md:mr-0 text-bsu-yellow font-bold">Already have an account?</p>
                        <a href="{{ route('login') }}"
                            class="register text-white bg-bsu-yellow rounded-xl py-2 px-5 hover:scale-110 font-semibold duration-300">Login</a>
                    </div>
                </div>
                <div class="md:block hidden w-1/2">
                    <img class="rounded-2xl h-3/4" src="{{ asset('img/BSU-BOKOD.jpg') }}" alt="BSU BOKOD">
                </div>
            </div>
        </section>
    </div>

</x-layouts.auth-layout>
