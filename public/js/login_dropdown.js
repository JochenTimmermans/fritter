/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function login_dropdown() {
    document.getElementById("logindropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  var target = document.getElementById("logindropdown");
  if (event.target.matches('.dropbtn')) {
    target.classList.toggle("hide");
  }
};

$(document).ready( function() {
  console.log('working');
    $("#logindropdown").on("clickoutside", function( ) {
      console.log('clicked outside');
      $("#logindropdown").hide();
    });
});