<nav class="navbar navbar-expand-lg ">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="#">FOOD ORDER</a>

    <!-- BAR BOTTON -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- MENU SECTION -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item "><a class="nav-link active" aria-current="page" href="">Home</a></li>
        <li class="nav-item"><a class="nav-link " href="#popular-dishes">Dishes</a></li>
        <li class="nav-item"><a class="nav-link" href="#about-us">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#order">Order</a></li>
      </ul>

      <!-- SEARCH BUTTON -->
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>

        <div class="search-result-body">
          <div class="container px-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div>
                      <div class="search-input">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                        <span id="close-search"><i class="fa-solid fa-xmark"></i></span>
                      </div>
                      <div class="search-result">
                        <table class="table text-white">
                          <tr>
                            <td><h3>Teasty Pizza</h3></td>
                            <td><img src="assets/images/dish-2.png" width="70px" alt=""></td>
                          </tr>

                          <tr>
                            <td><h3>Teasty Burger</h3></td>
                            <td><img src="assets/images/dish-3.png" width="70px" alt=""></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

    </div>
  </div>
</nav>

<script>
  const searchBtn = document.querySelector(".search-btn");
  const closeBtn = document.querySelector("#close-search");
  const searchBody = document.querySelector(".search-result-body");

  searchBtn.addEventListener("click", ()=>{
    searchBody.style.opacity = 1;
    searchBody.style.pointerEvents = "auto";
  });

  closeBtn.addEventListener("click", ()=>{
    searchBody.style.opacity = 0;
    searchBody.style.pointerEvents = "none";
  });
</script>