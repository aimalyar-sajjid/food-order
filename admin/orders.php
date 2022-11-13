<?php include_once("common/header.php"); ?>
<div class="row mt-3">
    <div class="col">
        <div class="card p-3">
            <h2>ORDERS</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Order</th>
                        <th>Additional</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="order_now_table">
                   <!-- DATA COME FROM AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function loadData()
    {
        $.ajax({
            url: "../actions/retrive.php",
            type: "POST",
            data: {action: "order_now"},
            success: function(data)
            {
                let obj = JSON.parse(data);
                let html = '';

                $.each(obj.order_now, function(key, value){
                    if(value.status == 1)
                    {
                        $status = "<td><span class='badge bg-danger'>Pending</span></td>";
                    }else
                    {
                        $status = "<td><span class='badge bg-success'>Deliverd</span></td>";
                    }
                    html +=`
                        <tr>
                            <td>${value.id}</td>
                            <td>${value.name}</td>
                            <td>${value.number}</td>
                            <td>${value.your_order}</td>
                            <td>${value.aditional}</td>
                            <td>${value.quantity}</td>
                            <td>${value.date}</td>
                            <td>${value.address}</td>
                            ${$status}
                        </tr>
                    `;
                });
                
                $("#order_now_table").html(html);
            }
        });
    }
    loadData();
</script>
<?php include_once("common/footer.php"); ?>