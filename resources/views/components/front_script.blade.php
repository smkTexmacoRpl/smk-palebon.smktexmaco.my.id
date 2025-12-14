<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
 const swiper = new Swiper(".myHeroSlider", {
				// Opsi: Slider akan berputar (looping)
				loop: true,

				// Opsi: Autoplay
				autoplay: {
					delay: 5000, // 5 detik
					disableOnInteraction: false, // Lanjut autoplay setelah user interaksi
				},

				// Mengaktifkan Paginasi (titik-titik)
				pagination: {
					el: ".swiper-pagination",
					clickable: true, // Titik bisa diklik
				},

				// Mengaktifkan Tombol Navigasi (panah)
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},

				// Efek transisi (opsional, 'fade' juga bagus untuk hero)
				effect: "slide", // atau 'fade'
			});
</script>