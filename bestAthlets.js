let table;

$(document).ready(function() {
    table = $('#tableTop10').DataTable({
        paging: false,
        searching: false
    });
});

let indexOfAthlet;

$('#tableTop10').on("click", "tbody tr", function() {
    const row = table.row(this).data();
    indexOfAthlet = row[0];
    console.log(row[0]);
    document.cookie = "index="+indexOfAthlet;

    $.ajax({
        type: "GET",
        url: "bestAthletDetail.php"
      }).done(function( data) {
        window.location.href = "https://site236.webte.fei.stuba.sk/oh/bestAthletDetail.php";
      });
})