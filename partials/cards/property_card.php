<?php
// src/Views/components/property_card.php

// Asegúrate de que las variables esperadas existan para evitar errores
// Si no están definidas, puedes asignarles valores por defecto o lanzar un error.
$title = $title ?? 'Propiedad sin título';
$imageUrl = $imageUrl ?? 'https://via.placeholder.com/300x200?text=Sin+Imagen';
$description = $description ?? 'Sin descripción disponible.';
$price = $price ?? 'N/A';
$location = $location ?? 'Ubicación Desconocida';
$beds = $beds ?? '?';
$baths = $baths ?? '?';
$propertyUrl = $propertyUrl ?? '#'; // URL a la página de detalle de la propiedad
?>

<div class="card bg-base-100 h-full flex flex-col overflow-hidden">
  <a href="<?= htmlspecialchars($propertyUrl) ?>" class="block">
    <figure class="relative w-full h-48">
      <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($title) ?>"
        class="w-full h-full object-cover rounded-t-lg" />
    </figure>
  </a>
  <div class="card-body p-4 flex-grow flex flex-col">
    <h3 class="card-title text-gray-900 mb-2">
      <a href="<?= htmlspecialchars($propertyUrl) ?>" class="hover:text-primary transition duration-300">
        <?= htmlspecialchars($title) ?>
      </a>
    </h3>
    <p class="text-lg font-semibold text-gray-800 mb-2">$<?= htmlspecialchars(number_format($price, 2)) ?></p>
    <p class="text-sm text-gray-600 mb-3 flex items-center">
      <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
          d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
          clip-rule="evenodd"></path>
      </svg>
      <?= htmlspecialchars($location) ?>
    </p>
    <p class="text-sm text-gray-700 mb-4 line-clamp-3"><?= htmlspecialchars($description) ?></p>
    <div class="flex items-center justify-between mt-auto text-gray-600 text-sm">
      <span class="flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m7 0V5a2 2 0 012-2h2a2 2 0 012 2v2M7 11V5a2 2 0 012-2h2m0 0H9m2 0H7m2 0H5">
          </path>
        </svg>
        <?= htmlspecialchars($beds) ?> Habitaciones
      </span>
      <span class="flex items-center">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 9V5a2 2 0 012-2h4a2 2 0 012 2v4m-4 0h4m-4 0v10m0 0h4m-4 0v-4m-6 4H6a2 2 0 01-2-2V6a2 2 0 012-2h2">
          </path>
        </svg>
        <?= htmlspecialchars($baths) ?> Baños
      </span>
    </div>
  </div>
</div>