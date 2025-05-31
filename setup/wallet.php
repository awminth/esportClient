<?php
    include("../config.php");
    include(root."master/header.php");
?>

<main class="p-3 mt-5">

    <section class="section dashboard mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <img src="<?=roothtml.'assets/img/card.jpg'?>" class="rounded-circle me-3" alt="..."
                                style="width: 50px; height: 50px;">
                            <span class="card-title">User Account</span>
                        </div>
                        <div class="card">
                            <div class="card-header row bg-info text-white">
                                <div class="col-8">
                                    <i class="bi bi-bank2 text-danger me-2" style="font-size:26px;"></i>
                                    <span>Main Wallet</span>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" class="btn btn-sm btn-secondary rounded-pill">
                                        &nbsp;&nbsp;&nbsp;
                                        Add
                                        &nbsp;&nbsp;&nbsp;
                                    </button>
                                </div>
                                <div class="col-12">12,000,000 Ks</div>
                            </div>
                            <div class="card-footer row bg-info text-white">
                                <div class="col-8">
                                    <i class="bi bi-briefcase-fill me-2 text-danger" style="font-size:26px;"></i>
                                    <span>Game Wallet</span>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" class="btn btn-sm btn-secondary rounded-pill">
                                        &nbsp;&nbsp;&nbsp;
                                        Add
                                        &nbsp;&nbsp;&nbsp;
                                    </button>
                                </div>
                                <div class="col-12">12,000,000 Ks</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="#" class="btn btn-outline-info"><i
                                        class="bi bi-card-list" style="font-size:30px;"></i><br>History</a>
                                <a href="#" class="btn btn-outline-info"><i
                                        class="bi bi-currency-dollar" style="font-size:30px;"></i><br>Withdraw</a>
                                <a href="#" class="btn btn-outline-info"><i
                                        class="bi bi-file-arrow-up" style="font-size:30px;"></i><br>Top Up</a>
                            </div>
                        </div>
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