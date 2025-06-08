<?php
    include("../config.php");
    include(root."master/header.php");
?>
<style>
  /* iframe ကို responsive ဖော်ပြဖို့ container လေး */
  .iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
  }
  .iframe-container iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }
  iframe {
    min-height: 60vh;
  }
</style>

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
                    // home.php
                    $allowedDomains = [
                        '568win.com',
                        'ex-api-demo-yy.568win.com',
                        'ggppqqgg.com',
                        'sports-demo.ggppqqgg.com' // သင်သုံးနေတဲ့ domain
                    ];

                    if (isset($_GET['target_url'])) {
                        $url = $_GET['target_url'];
                        $parsedUrl = parse_url($url);
                        $host = $parsedUrl['host'] ?? '';

                        if (in_array($host, $allowedDomains)) {
                            $safeUrl = htmlspecialchars($url);
                            echo '
                            <div class="iframe-container">
                                <iframe 
                                    src="' . $safeUrl . '" 
                                    referrerpolicy="unsafe-url"
                                    sandbox="allow-same-origin allow-scripts allow-popups"
                                    ></iframe>
                            </div>';
                        } else {
                            echo "<p>This URL is not allowed to be shown in an iframe.</p>";
                        }
                    } else {
                        echo "<p>No target URL provided.</p>";
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