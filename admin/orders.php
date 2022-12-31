<?php include_once("common/header.php"); ?>
<div class="row mt-3">
    <div class="col">
        <div class="card p-3">
            <div id="msg"></div>
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
                        <th>Action</th>
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
                    let color = '';
                    if(value.status == "Pending")
                    {
                        color = "bg-danger";
                    }else if(value.status == "Delivered")
                    {
                        color = "bg-success";
                    }else if(value.status == "Canceled")
                    {
                        color = "bg-warning";
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
                            <td><span class='badge ${color}'>${value.status}</span></td>
                            <td>
                                <button data-id="${value.id}" class="btn btn-sm btn-warning cancel"><i class="fa-solid fa-xmark"></i></button>
                                <button data-id="${value.id}" class="btn btn-sm btn-success approve"><i class="fa-solid fa-circle-check"></i></button>
                            </td>
                        </tr>
                    `;
                });
                
                $("#order_now_table").html(html);


                // CANCEL ORDER
                $.each($(".cancel"), function(){
                    $(this).on("click", function(){
                        let id = $(this).data("id");
                        $.ajax({
                            url: "../actions/update.php",
                            type: "POST",
                            data: {action: "update_order_status", id: id},
                            success: function(data)
                            {
                                data = JSON.parse(data);

                                if(data.status == 1)
                                {
                                    $("#msg").attr("class", "alert alert-warning").text(data.success);
                                    setTimeout(function(){
                                        $("#msg").attr("class", "").text("");
                                    }, 5000);

                                    loadData();
                                }else
                                {
                                    $("#msg").attr("class", "alert alert-danger").text(data.error);
                                    setTimeout(function(){
                                        $("#msg").attr("class", "").text("");
                                    }, 5000);
                                }
                            }
                        })
                    });
                });




                // DELIVERED ORDER
                $.each($(".approve"), function(){
                    $(this).on("click", function(){
                        let id = $(this).data("id");
                        $.ajax({
                            url: "../actions/update.php",
                            type: "POST",
                            data: {action: "update_order_status_delivered", id: id},
                            success: function(data)
                            {
                                data = JSON.parse(data);

                                if(data.status == 1)
                                {
                                    $("#msg").attr("class", "alert alert-success").text(data.success);
                                    setTimeout(function(){
                                        $("#msg").attr("class", "").text("");
                                    }, 5000);

                                    loadData();
                                }else
                                {
                                    $("#msg").attr("class", "alert alert-danger").text(data.error);
                                    setTimeout(function(){
                                        $("#msg").attr("class", "").text("");
                                    }, 5000);
                                }
                            }
                        })
                    });
                });
            }
        });
    }
    loadData();
</script>
<?php include_once("common/footer.php"); ?>