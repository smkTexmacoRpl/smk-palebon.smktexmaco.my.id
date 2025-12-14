{{-- @extends('layouts.apps')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div
        class="flex flex-col md:flex-row w-full max-w-5xl rounded-2xl shadow-lg overflow-hidden bg-white dark:bg-gray-800">

        {{-- Bagian kiri: Form Login --}}
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                Selamat Datang Kembali 👋
            </h2>

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input id="email" name="email" type="email" required autofocus class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="remember"
                            class="mr-2 rounded text-indigo-500 focus:ring-indigo-400">
                        Ingat saya
                    </label>
                    <a href="{{ url('password.request') }}" class="text-sm text-indigo-500 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg 
                           transition duration-300 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-500 hover:underline font-medium">Daftar
                    Sekarang</a>
            </p>
        </div>

        {{-- Bagian kanan: Ilustrasi --}}
        <div class="hidden md:flex w-1/2 bg-indigo-600 dark:bg-indigo-700 items-center justify-center">
            <img src="{{ asset('assets/images/login.webp') }}" alt="Login Illustration"
                class="w-3/4 h-[98vh] w-[99%] drop-shadow-lg">
        </div>

    </div>
</section>
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Glass Effect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'pulse-delay-2': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite 2s',
                        'pulse-delay-4': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite 4s'
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .glass-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        }
    </style>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 flex items-center justify-center p-4">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse-delay-2">
        </div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse-delay-4">
        </div>
    </div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md">
        <div
            class="glass-card backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Card Header -->
            <div class="p-8 text-center">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-lock text-white text-xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-purple-200">Sign in to your account</p>
            </div>

            <!-- Login Form -->
            <form class="px-8 pb-8">
                <div class="space-y-6">
                    <!-- Email Field -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-purple-300"></i>
                        </div>
                        <input type="email"
                            class="w-full pl-10 pr-4 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                            placeholder="Email address" required />
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-purple-300"></i>
                        </div>
                        <input type="password"
                            class="w-full pl-10 pr-12 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-300"
                            placeholder="Password" required />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                            onclick="togglePassword()">
                            <i class="fas fa-eye text-purple-300 hover:text-white transition-colors" id="eye-icon"></i>
                        </button>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox"
                                class="rounded border-white/20 bg-white/10 text-purple-400 focus:ring-purple-400 focus:ring-2" />
                            <span class="ml-2 text-sm text-purple-200">Remember me</span>
                        </label>
                        <button type="button" class="text-sm text-purple-300 hover:text-white transition-colors">
                            Forgot password?
                        </button>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-semibold py-4 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="px-8 py-4">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-transparent text-purple-200">Or continue with</span>
                    </div>
                </div>
            </div>

            <!-- Social Login Buttons -->
            <div class="px-8 pb-8">
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="flex items-center justify-center px-4 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-white transition-all duration-300">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="currentColor"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="currentColor"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="currentColor"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        <span class="ml-2">Google</span>
                    </button>
                    <button
                        class="flex items-center justify-center px-4 py-3 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        <span class="ml-2">Facebook</span>
                    </button>
                </div>
            </div>

            <!-- Sign Up Link -->
            <div class="px-8 pb-8 text-center">
                <p class="text-purple-200">
                    Don't have an account?
                    <a href="#" class="text-white font-semibold hover:text-purple-200 transition-colors ml-1">Sign
                        up</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.querySelector('input[type="password"]');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.className = 'fas fa-eye-slash text-purple-300 hover:text-white transition-colors';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fas fa-eye text-purple-300 hover:text-white transition-colors';
            }
        }
    </script>
</body>

</html>