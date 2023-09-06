// This is the JavaScript file for a manager user
// It adds some interactivity to the horizontal menu with the options: home, managers, empleados, libros, links and about

// Get the menu container element by its id
var menu = document.getElementById("menu");

// Get all the list items inside the menu container
var listItems = menu.getElementsByTagName("li");

// Loop through the list items and add an event listener for each one
for (var i = 0; i < listItems.length; i++) {
  // Get the current list item
  var listItem = listItems[i];

  // Add an event listener for the click event
  listItem.addEventListener("click", function (event) {
    // Prevent the default behavior of the link
    event.preventDefault();

    // Get the link element inside the list item
    var link = this.getElementsByTagName("a")[0];

    // Get the href attribute of the link element
    var href = link.getAttribute("href");

    // Display an alert message with the href value
    alert("You clicked on " + href);
  });
}
