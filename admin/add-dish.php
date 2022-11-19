<?php include_once("common/header.php"); ?>
<div class="row mt-3">
    <div class="col">
        <div class="card p-3">
            <form id="add-menu-form" class="row">
                <input type="hidden" name="action" id="action" value="add-menu">
                <input type="hidden" name="dish-id" id="dish-id">

                <div class="form-group col-md-3">
                    <input type="text" name="title" id="title" class="form-control validate" placeholder="Title">
                    <small></small>
                </div>

                <div class="form-group col-md-3">
                    <input type="text" name="description" id="description" class="form-control validate" placeholder="Description">
                    <small></small>
                </div>

                <div class="form-group col-md-1">
                    <input type="number" name="price" id="price" class="form-control validate" placeholder="Price">
                    <small></small>
                </div>

                <div class="form-group col-md-3">
                    <input type="hidden" name="old-picture" id="old-picture">
                    <input type="file" name="picture" id="picture" class="form-control validate">
                    <img width="50px">
                    <small></small>
                </div>

                <div class="form-group col-md-2">
                    <button class="btn form-btn btn-danger">Add Dish</button>
                </div>

                <div id="success-msg"></div>
            </form>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <div class="card p-3">
            <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="dish-data-table">
                    <!-- DATA COME FRO AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="module">
    import {validate} from "./../assets/js/library.js";

    function loadData()
    {
        $.ajax({
            url: "../actions/retrive.php",
            type: "POST",
            data: {action: "dishes"},
            success: function(data)
            {
                let obj = JSON.parse(data);
                let html = "";

                $.each(obj.menu, function(key, value){
                    if(value.status == 1)
                    {
                        status = "<td><span class='badge bg-success'>Active</span></td>";
                    }else
                    {
                        status = "<td><span class='badge bg-success'>Inactive</span></td>";
                    }
                    html += `
                        <tr>
                            <td>${value.id}</td>
                            <td>${value.title}</td>
                            <td style='width: 450px'>${value.decription}</td>
                            <td>${value.price}</td>
                            ${status}
                            <td>
                                <a href="" 
                                data-id="${value.id}" 
                                data-title="${value.title}"
                                data-des="${value.decription}"
                                data-price="${value.price}"
                                data-picture="${value.picture}"
                                class="btn edit-btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" data-id="${value.id}" class="btn btn-sm btn-danger delete-btn"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    `;
                });

                $("#dish-data-table").html(html);

                // DELETE DISH
                $.each($(".delete-btn"), function(){
                    $(this).on("click", function(e){
                        e.preventDefault();
                        
                        let id = $(this).data("id");

                        $.ajax({
                            url: "../actions/delete.php",
                            type: "POST",
                            data: {action: "delete-dish", id:id},
                            success: function(data)
                            {
                                let result = JSON.parse(data);
                                if(result.status == 1)
                                {
                                    // SHOW MSG
                                    $("#success-msg").attr("class", "alert alert-success mt-3").text(result.success);

                                    // HIDE MSG
                                    setTimeout(function(){
                                        $("#success-msg").removeAttr("class").text("");
                                    }, 5000);

                                    // LOAD TABLE
                                    loadData();
                                }else
                                {
                                    // SHOW MSG
                                    $("#success-msg").attr("class", "alert alert-success mt-3").text(result.error);

                                    // HIDE MSG
                                    setTimeout(function(){
                                        $("#success-msg").removeAttr("class").text("");
                                    }, 5000);
                                }
                            }
                        });
                    });
                });


                // EDIT DISH
                $.each($(".edit-btn"), function(){
                    $(this).on("click", function(e){
                        e.preventDefault();

                        $("#action").val("update-dish");
                        $("#dish-id").val($(this).data("id"));
                        $("#title").val($(this).data("title"));
                        $("#description").val($(this).data("des"));
                        $("#price").val($(this).data("price"));
                        $("#old-picture").val($(this).data("picture"));
                        $("form .form-group img").attr("src", "../assets/images/" + $(this).data("picture"));
                        $(".form-btn").text("Update Dish").attr("class", "btn btn-success");
                        
                    });
                });
            }
        });



        

    }
     loadData();

     function addData()
     {
        $("#add-menu-form").on("submit", function(e){
            e.preventDefault();
            
            
            if(validate(".validate"))
            {
                let formData = new FormData(this);
                $.ajax({
                    url: "../actions/insert.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $(".form-btn").text("Adding...").attr("disabled", "true");
                    },
                    success: function(data)
                    {
                        let result = JSON.parse(data);
                        if(result.status == 1)
                        {
                            $("#success-msg").attr("class", "alert alert-success mt-3").text(result.success);
                            $(".form-btn").text("Add Dish").removeAttr("disabled");

                            // HIDE MESSAGE
                            setTimeout(function(){
                                $("#success-msg").removeAttr("class").text("");
                            }, 5000);

                            $("form").trigger("reset");

                            // UPDATE TABLE 
                            loadData();
                        }else
                        {
                            $("#success-msg").attr("class", "alert alert-danger mt-3").text(result.error);
                            $(".form-btn").text("Add Dish").removeAttr("disabled");

                            // HIDE MESSAGE
                            setTimeout(function(){
                                $("#success-msg").removeAttr("class").text("");
                            }, 5000);
                        }
                    }
                });
            }
        });
     }
     addData();




</script>
<?php include_once("common/footer.php"); ?>