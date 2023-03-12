let table;

$(document).ready(function() {
    table = $('#tableTop10').DataTable({
        paging: false
    });
});

$('#tableTop10').on("click", "tbody tr", function() {
    const row = table.row(this).data();
    console.log(row[0]);
})