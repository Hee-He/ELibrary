function Sure() {
    var userConfirm = confirm("Are You Sure!");    
    if (userConfirm) {
        // Use AJAX to notify the server about the user confirmation
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'logout.php', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText);  // Log the response
                // Handle the response if needed
            }
        };

        xhr.send();
        window.location.href = "logout.php";
    }
}

var table = document.getElementById("issued");
function Showtable() 
{
  table.style.display = "block";
  document.querySelector(".container").style.display = "none";;
}


function booklist()
{
    document.querySelector(".container").style.display = "block";;
    table.style.display = "none";
}

function toggleDropdown() {
var dropdownContent = document.getElementById("myDropdown");
dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
if (!event.target.matches('.dropdown-btn')) {
  var dropdowns = document.getElementsByClassName("dropdown-content");
  for (var i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.style.display === "block") {
      openDropdown.style.display = "none";
    }
  }
}
}

$(document).ready(function() {
  $('#dropdown').change(function() {
      var selectedOption = $(this).val();
      if (selectedOption !== "") {
          $.ajax({
              url: 'booklst.php',
              type: 'POST',
              data: { option: selectedOption },
              success: function(response) {
                  $('#output').html(response);
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });
      }
  });
});
