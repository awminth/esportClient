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
                                    <i class="bi bi-briefcase-fill text-danger me-2" style="font-size:26px;"></i>
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
                    </div>
                    <!-- Show IFrame -->
                    <?php
                    // Check if the target_url query parameter exists
                    if (isset($_GET['target_url'])) {
                        $targetUrl = htmlspecialchars($_GET['target_url']); // Sanitize the URL

                        // Add an iframe to display the content from the target URL
                        echo '<div class="col-12 mt-3">'; // Add some margin top
                        echo '<iframe src="' . $targetUrl . '" style="width:100%; height:600px; border:none;"></iframe>'; // Adjust height as needed
                        echo '</div>';
                    } 
                    else {
                        // Optional: Display a message if no target_url is provided
                        echo '<div class="col-12 mt-3">';
                        echo '<p>No redirect URL specified.</p>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
            <!-- <div class="mt-5"></div> -->
        </div>
    </section>

</main>


<?php
    include(root."master/footer.php");
?>