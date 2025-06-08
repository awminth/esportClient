<?php 

//for local xampp
error_reporting(0);
ob_start();

include("../config.php");
$action=$_POST["action"];

if ($action == "login") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $device = getDeviceType();

    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try {
        $sql = "SELECT * FROM tblplayer WHERE UserName=? AND Password=? FOR UPDATE";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $serverid = $row['ServerID'];

            // Call API
            $url = "https://ex-api-demo-yy.568win.com/web-root/restricted/player/v2/login.aspx";

            $postData = [
                "Lang" => "EN",
                "Device" => $device,
                "BetCode" => "string",
                "GameId" => 0,
                "GpId" => 0,
                "Username" => $username,
                "Portfolio" => "SportsBook",
                "IsWapSports" => false,
                "CompanyKey" => $companykey,
                "ServerId" => $serverid
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);

            //for local xampp
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Only for dev
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Only for dev

            $response = curl_exec($ch);
            curl_close($ch);

            $apiResponse = json_decode($response, true);

            //check error log in local xampp
            error_log("API Response: " . print_r($apiResponse, true));

            if (isset($apiResponse['url']) && !empty($apiResponse['url'])) {
                mysqli_commit($con);

                // Save session
                $_SESSION["esportclient_userid"] = $row['AID'];
                $_SESSION["esportclient_username"] = $row['UserName'];
                $_SESSION["esportclient_userpassword"] = $row['Password'];

                // Handle remember me
                if (!empty($_POST['remember'])) {
                    setcookie("member_login", $row['UserName'], time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("member_password", $row['Password'], time() + (10 * 365 * 24 * 60 * 60));
                } 
                else {
                    setcookie("member_login", '');
                    setcookie("member_password", '');
                }

                $url = $apiResponse['url'];
                if (strpos($url, '//') === 0) {
                    $url = 'https:' . $url;
                }

                //for local xampp
                ob_clean();

                // Redirect to one-time login URL
                echo json_encode([
                    "status" => "success",
                    "redirect_url" => $url
                ]);
                exit();
            } 
            else {
                mysqli_rollback($con);
                //for local xampp
                ob_clean();

                echo json_encode([
                    "status" => "error",
                    "message" => "No URL received from API."
                ]);
                exit();
            }
        } 
        else {
            mysqli_rollback($con);
            echo "Invalid credentials.";
        }
    } 
    catch (Exception $e) {
        mysqli_rollback($con);
        error_log($e->getMessage());
        //for local xampp
        ob_clean();

        echo "System error.";
    }
}


function getDeviceType() {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mobileKeywords = ['android', 'iphone', 'ipad', 'ipod', 'blackberry', 'windows phone'];

    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return 'm'; // Mobile
        }
    }
    return 'd'; // Desktop
}

?>