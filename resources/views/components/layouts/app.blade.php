<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>SMK Palebon</title>
	<link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
	<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
	<link href="https://fonts.googleapis.com" rel="preconnect" />
	<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap"
		rel="stylesheet" />
	<script>
		tailwind.config = {
				darkMode: "class",
				theme: {
					extend: {
						colors: {
							primary: "#1541b2",
							"background-light": "#f6f6f8",
							"background-dark": "#111521",
						},
						fontFamily: {
							display: ["Inter"],
						},
						borderRadius: {
							DEFAULT: "0.25rem",
							lg: "0.5rem",
							xl: "0.75rem",
							full: "9999px",
						},
					},
				},
			};
	</script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
	<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
		<x-halaman_depan.front_header />
		<main class="flex-1">
			<section class="relative">
				<x-halaman_depan._front_hero />
			</section>
			<section class="py-16 md:py-24">
				<X-halaman_depan.front_key />
			</section>
			<section class="bg-background-light py-16 dark:bg-background-dark/50 md:py-24">
				@include('front.beritaTerbaru')
			</section>
			<section>
				@yield('content')
			</section>
		</main>
		<footer
			class="border-t border-background-dark/10 bg-background-light py-8 dark:border-background-light/10 dark:bg-background-dark/50">
			<div
				class="mx-auto max-w-7xl px-4 text-center text-sm text-background-dark/60 dark:text-background-light/60">
				<p>© 2025 SMK PALEBON. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
</body>

</html>