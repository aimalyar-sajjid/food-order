<?php require_once("common/header.php") ?>
<?php include ("common/slider.php") ?>


    <!-- PRODUCTS -->
    <div class="container" id="popular-dishes">
                <!-- SECTION -->
        <div class="my-5 text-center">
            <h1>POPULAR DISHES</h1>
        </div>


        <div class="row">
            <?php
                include "config/db.php";
                $obj = new db();

                $records = $obj->select("SELECT * FROM menu");

                // echo "<pre>";
                // print_r($records);
                // echo "</pre>";

                if(count($records) > 0)
                {
                    foreach($records as $record)
                    {
                           
                    
            ?>
            <div class="col-md-3">
                <div class="card home-dish-card">
                <div class="dish-image text-center">
                    <img src="assets/images/<?php echo $record['picture']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $record['title']; ?></h5>
                    <p class="card-text">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                </p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link">$ <?php echo $record['price'] ?></a>
                    <a href="#" class="card-link">Add To Cart</a>
                </div>
                </div>
            </div>
            <?php 
            }
            }else
            {
                echo "No product!";
            }
            ?>




        </div>
    </div>
</div>





<div class="row" id="about-us">
    <div class="col">
        <!-- SECTION -->
        <div class="my-5 text-center">
            <h1>ABOUT US</h1>
        </div>
    </div>
</div>
<!-- ABOUT US SECTION -->
<div class="container-fluid about-wrapper">
<div class="container">

    <div class="row" >
        <div class="col-md-5">
            <div class="about-img">
                <img src="assets/images/about-img.png" alt="">
            </div>
        </div>

        <div class="col-md-7">
            <div class="about-us">
                <h2>We and Our Best Services</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum porro, ipsa accusamus quis consequatur maxime ipsum. Enim temporibus quae aperiam, odit pariatur eveniet at, in, vel reprehenderit repellat eligendi sequi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, architecto ratione similique ab quisquam atque delectus eligendi quo ex repellat itaque at accusantium libero blanditiis? Quo rem recusandae adipisci ad?</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum porro, ipsa accusamus quis consequatur maxime ipsum. Enim temporibus quae aperiam, odit pariatur eveniet at, in, vel reprehenderit repellat eligendi sequi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, architecto ratione similique ab quisquam atque delectus eligendi quo ex repellat itaque at accusantium libero blanditiis? Quo rem recusandae adipisci ad?</p>
                <ul>
                    <li><i class="fa-solid fa-truck me-2"></i>Free Delivery</li>
                    <li><i class="fa-solid fa-euro-sign me-2"></i>Easy Payment</li>
                    <li><i class="fa-solid fa-clock m2-2"></i>24/7 Service</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>





  <!-- PRODUCTS -->
  <div class="container" id="menu">
                <!-- SECTION -->
        <div class="my-5 text-center">
            <h1>OUR MENU</h1>
        </div>


        <div class="row" >
            <?php 
                $menus = $obj->select("SELECT * FROM menu");

                if(count($menus) > 0)
                {
                    foreach($menus as $menu)
                    {
            ?>
                <div class="col-md-3">
                <div class="card menu-card">
                <div class="dish-image text-center">
                    <img src="assets/images/<?php echo $menu['picture']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </p>
                    <h5 class="card-title"><?php echo $menu['title'] ?></h5>
                    <p><?php echo $menu['decription']; ?></p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link">$ <?php echo $menu['price']; ?></a>
                    <a href="#" class="card-link">Explore</a>
                </div>
                </div>
            </div>
            <?php 
            }
            }else{
                echo "No dish on menu!";
            }
            ?>

        </div>
    </div>
</div>







<!-- ORDER FORM -->
<div class="container-fluid my-5 form-wrapper" id="order">
    <div class="row" > 
        <div class="col">
                            <!-- SECTION -->
        <div class="mb-4 text-center">
            <h1>ORDER NOW</h1>
        </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" id="order-form" method="POST" class="row">

                    <!-- DEFIN ACTION -->
                    <input type="hidden" name="action" value="insert-order">

                    <div class="form-group col-md-6">
                        <label for="name">Your Name</label>
                        <input type="text" name="your-name" class="form-control" id="name">
                        <small></small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="number">Your Number</label>
                        <input type="text" name="your-number" class="form-control" id="number">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="order">Your Order</label>
                        <input type="text" name="your-order" class="form-control" id="order">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="aditional-food">Aditional Food</label>
                        <input type="text" name="additional-order" class="form-control" id="aditional-food">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="quantity">
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="datetime">Date & Time</label>
                        <input type="date" name="date" class="form-control" id="datetime">
                        <small></small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Your Address</label>
                        <textarea rows="6" name="your-address" class="form-control" id="address"></textarea>
                        <small></small>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="msg">Your Message</label>
                        <textarea rows="6" name="message" class="form-control" id="msg"></textarea>
                        <small></small>
                    </div>

                    <div class="form-group col">
                        <button class="btn btn-danger" id="submit-btn" name="submit">Submit Your Order</button>
                    </div>

                </form>
                <div id="success-msg"></div>
            </div>
        </div>
    </div>
</div>
<script type="module">
    import {validate} from "./assets/js/library.js";
    
    $("#order-form").on("submit", function(e){
        e.preventDefault();

        const form = document.querySelector("#order-form");

        if(validate(".form-control"))
        {
            let formData = new FormData(form);

            $.ajax({
                url: "actions/insert.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $("#submit-btn").text("Wait...").attr("disabled", "true");
                },
                success: function(data)
                {
                    let obj = JSON.parse(data);
                    if(obj.status == 1)
                    {
                        $("#submit-btn").text("Submit Order").removeAttr("disabled");
                        $("#success-msg").html(obj.success).attr("class", "alert alert-success");

                        setTimeout(()=>{
                            $("#success-msg").html("").attr("class", "");
                        }, 5000);

                        $("form").trigger("reset");
                    }else
                    {
                        $("#submit-btn").text("Submit Order").removeAttr("disable");
                        $("#success-msg").html(obj.error);
                    }
                }
            });
        }
    });
</script>
<?php require_once("common/footer.php") ?>