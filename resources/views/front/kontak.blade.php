@extends('layouts.utama')

@section('content')
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-6 mt-[10vh]">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
            Hubungi Kami
        </h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- === KIRI: FORM KONTAK === -->
            <div class="card shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="card-body">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">
                            Kirim Pesan Anda
                        </h2>

                        <form id="contactForm" action="{{ route('kontak.send') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Nama Lengkap
                                </label>
                                <input type="text" name="name" id="name" required
                                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>

                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" required
                                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>

                            <div>
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Subjek
                                </label>
                                <input type="text" name="subject" id="subject"
                                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>

                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Pesan
                                </label>
                                <textarea name="message" id="message" rows="5" required
                                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-linear-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white py-3 rounded-lg font-semibold transition-colors duration-300">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>

                </div>
            </div>


            <!-- === KANAN: GOOGLE MAPS === -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <iframe class="w-full h-[500px] rounded-2xl"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.2347898962744!2d110.40441117598653!3d-7.187977071357863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f37b64c7c87b%3A0x5a73b872f4a9c274!2sSMK%20Texmaco%20Semarang!5e0!3m2!1sid!2sid!4v1727700000000!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- Notification Container -->
<div id="notificationContainer" class="fixed top-4 right-4 z-50"></div>

<script>
    function showNotification(message, type = 'success') {
        const container = document.getElementById('notificationContainer');
        const notification = document.createElement('div');
        
        const bgColor = type === 'success' ? 'bg-green-700' : 'bg-red-500';
        const icon = type === 'success' ? '✓' : '✕';
        
        notification.className = `${bgColor} text-white px-6 py-4 rounded-lg shadow-lg mb-3 flex items-center gap-3 animate-slide-in`;
        notification.innerHTML = `
            <span class="text-xl font-bold">${icon}</span>
            <span>${message}</span>
        `;
        
        container.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('animate-slide-out');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    @if (session('success'))
        showNotification('{{ session("success") }}', 'success');
    @endif
</script>

<style>
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }

        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }

    .animate-slide-out {
        animation: slideOut 0.3s ease-out;
    }
</style>
@endsection