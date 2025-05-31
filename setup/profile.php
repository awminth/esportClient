<?php
    include("../config.php");
    include(root."master/header.php");
?>

<main class="p-3 mt-5">

    <section class="section dashboard mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <img src="<?=roothtml.'assets/img/card.jpg'?>" class="rounded-circle me-3" alt="..."
                        style="width: 50px; height: 50px;">
                    <span class="card-title">User Account</span>
                </div>
                <div class="card">
                    <div class="card-body mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pt-3 pb-3" id="btnprofiletag" data-name="language"
                                style="cursor:pointer;">
                                <i class="bi bi-layers-fill me-3 text-success"></i> Language
                            </li>
                            <li class="list-group-item pt-3 pb-3" id="btnprofiletag" data-name="help_support"
                                style="cursor:pointer;">
                                <i class="bi bi-pencil-fill me-3 text-primary"></i>
                                Help & Support
                            </li>
                            <li class="list-group-item pt-3 pb-3" id="btnprofiletag" data-name="change_password"
                                style="cursor:pointer;">
                                <i class="bi bi-key-fill me-3 text-info"></i>
                                Change Password
                            </li>
                            <li class="list-group-item pt-3 pb-3" id="btnprofiletag" data-name="logout"
                                style="cursor:pointer;">
                                <i class="bi bi-box-arrow-right me-3 text-danger"></i>
                                Logout
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="mt-5"></div> -->
        </div>
    </section>

</main>


<?php
    include(root."master/footer.php");
?>

<script>
$(document).ready(function() {
    $(document).on("click", "#btnprofiletag", function(e) {
        e.preventDefault();
        var name = $(this).data("name");
        alert(name);
    });
});
</script>