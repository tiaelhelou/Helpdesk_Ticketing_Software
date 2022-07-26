

  function search() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  var reversed=false;

    function sort() {
      var table, tr, i;
      var x=1;
 
      var button = document.getElementById("sort");
      table = document.getElementById("table");
      tr = table.getElementsByTagName("tr");
      console.log(tr[1])
      for(i = tr.length-1; i > 1; i--){
        tr[i].parentNode.insertBefore(tr[tr.length-1], tr[x++]);
      }

      if(reversed == true){
        button.innerHTML='<i class="fas fa-align-right"> </i> Newest to Oldest';
        reversed=false;
      }
      else{
        reversed=true;
        button.innerHTML='<i class="fas fa-align-right"> </i> Oldest to Newest';
      }
    }