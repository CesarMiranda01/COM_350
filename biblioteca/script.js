function loginUser() {
  // Aquí puedes realizar validaciones adicionales antes de enviar el formulario
  return true;
}
document.addEventListener("DOMContentLoaded", function() {
  // Recuperar el tipo de usuario de la sesión PHP
  // <?php session_start(); ?>
  var userType = "<?php echo isset($_SESSION['userType']) ? $_SESSION['userType'] : 'guest'; ?>";
  // Habilitar o deshabilitar enlaces de menú según el tipo de usuario
  var menuItems = document.querySelectorAll(".menu a");
  for (var i = 0; i < menuItems.length; i++) {
      var menuItem = menuItems[i];
      if (menuItem.id.startsWith(userType)) {
          menuItem.style.pointerEvents = "auto";
      } else {
          menuItem.style.pointerEvents = "none";
      }
  }
});
