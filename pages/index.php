<?php
require('system/main.php');

$layout = new HTML(title: 'PHP via Vite');

$properties = [
	[
		'id' => 1,
		'title' => 'Amplio Departamento con Vista al Mar',
		'description' => 'Luminoso departamento de 3 habitaciones con vistas espectaculares al mar en Miraflores. Cerca de parques y restaurantes.',
		'price' => 485000.00,
		'imageUrl' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
		'location' => 'Miraflores, Lima',
		'beds' => 3,
		'baths' => 2.5,
	],
	[
		'id' => 2,
		'title' => 'Casa Familiar en San Isidro',
		'description' => 'Hermosa casa de 4 habitaciones con jardín grande y piscina. Ideal para familias. Cerca de colegios y centros comerciales.',
		'price' => 950000.00,
		'imageUrl' => 'https://images.pexels.com/photos/164041/pexels-photo-164041.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
		'location' => 'San Isidro, Lima',
		'beds' => 4,
		'baths' => 3,
	],
	[
		'id' => 3,
		'title' => 'Loft Moderno en Barranco',
		'description' => 'Compacto y moderno loft, perfecto para solteros o parejas. Excelente ubicación, cerca de bares y vida nocturna.',
		'price' => 210000.00,
		'imageUrl' => 'https://images.pexels.com/photos/1428348/pexels-photo-1428348.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
		'location' => 'Barranco, Lima',
		'beds' => 1,
		'baths' => 1,
	],
];
?>

<main class="flex flex-col px-4 lg:px-0">

	<section class="flex flex-col mx-auto max-w-2xl gap-8 w-screen h-screen items-center justify-center ">
		<article class="flex flex-col gap-3">
			<h1 class="text-4xl font-bold text-center">Encuentra tu hogar ideal</h1>
			<p class="text-center text-xl">Descubre miles de propiedades en las mejores ubicaciones. Tu nuevo hogar te está
				esperando.
			</p>
		</article>
		<div class="card w-full">
			<div class="card-body">
				<div class="join w-full">
					<input class="input join-item" placeholder="Buscar" />
					<button class="btn btn-primary join-item">Buscar</button>
				</div>
			</div>
		</div>
		<div class="grid grid-cols-2 gap-6 max-w-md mx-auto">
			<div class="flex flex-col gap-0.5 text-center">
				<p class="text-2xl font-bold">+1,200</p>
				<p class="text-lg">Propiedades</p>
			</div>
			<div class="flex flex-col gap-0.5 text-center">
				<p class="text-2xl font-bold">98%</p>
				<p class="text-lg">Satisfacción</p>
			</div>
		</div>
	</section>
	<!-- Featured Properties -->
	<section class="flex flex-col max-w-5xl mx-auto gap-6 w-full py-20">
		<div class="w-full flex justify-between items-center gap-4">
			<h2 class="text-3xl font-bold text-center lg:text-start">Propiedades recomendadas</h2>
			<a class="btn btn-outline btn-primary hidden lg:flex">Ver más</a>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			<?php foreach ($properties as $property): ?>
				<?php
				$title = $property['title'];
				$imageUrl = $property['imageUrl'];
				$description = $property['description'];
				$price = $property['price'];
				$location = $property['location'];
				$beds = $property['beds'];
				$baths = $property['baths'];
				$propertyUrl = "/properties/{$property['id']}";
				?>
				<?php include 'partials/cards/property_card.php'; ?>
			<?php endforeach; ?>
		</div>
		<a class="btn btn-outline btn-primary lg:hidden">Ver más</a>
	</section>
	<!-- Featured Properties End -->
</main>
<!-- FlyonUI Components -->
<script src="../node_modules/flyonui/flyonui.js"></script>
<!-- FlyonUI Components End -->
<script src="/src/scripts/repos.ts" type="module"></script>