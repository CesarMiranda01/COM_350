<?php
// This is the PHP file for a manager user
// It displays a horizontal menu with the options: home, managers, empleados, libros, links and about

// Include the CSS file for styling
echo "<link rel='stylesheet' href='style.css'>";

// Include the JavaScript file for interactivity
echo "<script src='script.js'></script>";

// Define an array of menu items
$menu_items = array("HOGAR", "ADMINISTRADORES", "EMPLEADOS", "VER_LIBROS", "LIBROS_PRESTADOS", "ACERCA DE LA EMPRESA");
//$menu_files = array("hogar.php","admin.php", "employes.php", "books.php", "links.php", "about.php");

// Create a div element for the menu container
echo "<div id='menu'>";

// Loop through the menu items and create a list element for each one
foreach ($menu_items as $item) {
  // Create a list item element with a link to the corresponding page
  echo "<li><a href='$item.php'>$item</a></li>";
}

// Close the div element for the menu container
echo "</div>";
?>
