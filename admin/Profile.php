<?php include_once("common/header.php"); ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="img">
                    
                </div>
            </div>
            
            <div class="card-body" id="profile-table">

            </div>
        </div>
    </div>
</div>



<!-- MODEL BOX FOR CHANING PASSWORD -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div id="success-msg"></div>
        <form action="">
            <input type="hidden" id="userid">

            <div class="form-group mb-3">
                <input type="password" id="currentPassword" name="current-password" class="form-control validate" placeholder="Enter Current Password">
                <small></small>
            </div>

            <div class="form-group mb-3">
                <input type="password" id="newPassword" name="new-password" class="form-control validate" placeholder="Enter New Password">
                <small></small>
            </div>

            <div class="form-group">
                <input type="password" id="confirmPassword" name="confirm-password" class="form-control validate" placeholder="Confirm Password">
                <small></small>
            </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="changePassword" class="btn btn-primary">Change Password</button>
      </div>
    </div>
  </div>
</div>

<script type="module">
    import {validate} from "./../assets/js/library.js";

    $(document).ready(function(){
        $.ajax({
            url: "../actions/retrive.php",
            type: "POST",
            data: {action: "profile", adminId: "<?php echo $_SESSION['user_id'] ?>"},
            success: function(data)
            {
                let dataObj = JSON.parse(data).profile[0];

                $(".img").html(`<img src="../assets/images/${dataObj.picture}" class="img-thumbnail" width="180px" alt="">`);
                let profileData = `
                <table class="table">
                    <tr>
                        <td class="text-end fw-bold">Name</td>
                        <td>${dataObj.user_name}</td>
                    </tr>
                    <tr>
                        <td class="text-end fw-bold">Gender</td>
                        <td>${dataObj.gender}</td>
                    </tr>
                    <tr>
                        <td class="text-end fw-bold">Email</td>
                        <td>${dataObj.email}</td>
                    </tr>
                    <tr>
                        <td class="text-end fw-bold">Password</td>
                        <td><button id="cpassword" data-id="${dataObj.id}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge border-0 bg-success">Change Password</button></td>
                    </tr>
                </table>
                `;

                $("#profile-table").html(profileData);

                $("#cpassword").click(function(){
                    $("#userid").val($(this).data("id"));
                });
            }
        });



        // LETS UPDATE PASSWORD
        $("#changePassword").click(function(){
            if(validate(".validate"))
            {
                if($("#newPassword").val() != $("#confirmPassword").val())
                {
                    $("#confirmPassword + small").text("Password didn't match!");
                }else
                {
                    let adminId = $("#userid").val();
                    let currentPassword = $("#currentPassword").val();
                    let newPassword = $("#newPassword").val();

                    $.ajax({
                        url: "../actions/update.php",
                        type: "POST",
                        data: {action: "updatePassword", adminId: adminId, currentPassword: currentPassword, newPassword: newPassword},
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

                }
            }
        });
    });
</script>
<?php include_once("common/footer.php"); ?>