$(document).ready(function() {
   table = $('#athletesTable').DataTable({

        columnDefs: [{
                targets: [0, 3, 4, 6],
                orderable: false
            },
            {
                targets: [5],
                orderData: [2],
            }
        ],
    });
});