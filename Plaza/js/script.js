//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//////////////////////////////////////////////////////// jquery
/* $(document).ready(function () 
{
  $('#cat').on('change',function () {
    var catId = $(this).value();
    if (catId)
    {
      $.get(
        "include/select.php",
        {categorie : catId},
        function (data) {
          $('#room').html(data);
        }
      );
    }
    else
    {
      $('#room').html('<option>Select Categorie First</option>');
    }
  })
}
) */



