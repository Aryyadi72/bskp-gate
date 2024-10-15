@extends('auth.layouts.main')
@section('content')
    <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="{{ asset('assets/images/mature-1.jpg') }}" alt="" class="w-full h-full object-cover" />
    </div>

    <div
        class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        <div class="w-full h-100">
            <h1 class="text-xl font-bold">BSKP-GATE Forgot Password</h1>
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">
                Reset Password
            </h1>

            <form class="mt-6" action="{{ route('forgot-password-link') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="" placeholder="Enter Email Address"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required />
                </div>

                {{-- <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="" id="" placeholder="Enter Password" minlength="6"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required />
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Re-Enter Password</label>
                    <input type="password" name="" id="" placeholder="Enter Password" minlength="6"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required />
                </div> --}}

                <button type="submit"
                    class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                    Submit
                </button>
            </form>

            <hr class="my-6 border-gray-300 w-full" />

            <p class="mt-8">
                have account?
                <a href="{{ route('auth') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                    Back to Login
                </a>
            </p>

            <p class="text-sm text-gray-500 mt-12 text-center">
                &copy; 2021 Talwind - All Rights Reserved.
            </p>
        </div>
    </div>
@endsection
