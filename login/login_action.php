<?php 

include("../config.php");
$action=$_POST["action"];

if($action=="login11111"){
    $serverid = "";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql = "select * from tblplayer where UserName='$username' and Password='$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $serverid = $row['ServerID'];

        //Send data to API
        $url = "https://ex-api-demo-yy.568win.com/web-root/restricted/player/login.aspx"; // Replace with your API URL

        $data = [
            "CompanyKey" => $companykey,
            "ServerId" => $serverid,
            "Username" => $username,
            "Portfolio" => $portfolio,
            "IsWapSports" => "true",
        ];

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        
        // Send JSON data
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
        // Set the appropriate Content-Type for JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        // Execute the request and get the response
        $response = curl_exec($ch);

        // Decode JSON
        $data = json_decode($response, true);

        // Close cURL session
        curl_close($ch);

        // note username & password in session
        $_SESSION["esportclient_userid"] = $row['AID'];
        $_SESSION["esportclient_username"] = $row['UserName'];   
        $_SESSION["esportclient_userpassword"] = $row['Password']; 

        //remember username and password
        if(!empty($_POST['remember'])){
            setcookie("member_login",$row['UserName'],time()+(10*365*24*60*60));
            setcookie("member_password",$row['Password'],time()+(10*365*24*60*60));
        }
        else{
            if(isset($_COOKIE['member_login'])){
                setcookie("member_login",'');
            }
            if(isset($_COOKIE['member_password'])){
                setcookie("member_password",'');
            }
        }
        

        //go to white lable
        $lang = "en";
        $device = getDeviceType();
        $finalUrl = "https:{$data['url']}&gpid={$gpid}&gameId={$gameId}&lang={$lang}&device={$device}";
        echo $finalUrl;
        
        // if (isset($data['url'])) {
        //     $finalUrl = "{$data['url']}&gpid={$gpid}&gameId={$gameId}&lang={$lang}&device={$device}";
            
        //     $_SESSION['iframe_url'] = $finalUrl; // Store the URL in session
            
        //     echo "success"; // Send success response
        // } 
        // else {
        //     echo "error"; // Indicate an error
        // }

        // Redirect to the received URL
        // if (!empty($finalUrl)) {
        //     header("Location: " . $finalUrl);
        //     exit(); // Stop further execution
        // } else {
        //     echo "Error: No URL received from API.";
        // }
        
    }

}

if($action=="login"){
    //Send data to API
    $url = "https://ex-api-demo-yy.568win.com/web-root/restricted/player/login.aspx"; // Replace with your API URL

    $data = [
        "CompanyKey" => "E7B305CAFF794BA7926F96DDE9AC392Z",
        "ServerId" => "YY-test",
        "Username" => "0990000002_bossxdemoagentmmk001",
        "Portfolio" => $portfolio,
        "IsWapSports" => "true",
    ];

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    
    // Send JSON data
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    // Set the appropriate Content-Type for JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);

    // Execute the request and get the response
    $response = curl_exec($ch);

    // Decode JSON
    $data = json_decode($response, true);

    // Close cURL session
    curl_close($ch);

    //go to white lable
    $lang = "en";
    $device = getDeviceType();
    $finalUrl = "https:{$data['url']}&gpid={$gpid}&gameId={$gameId}&lang={$lang}&device={$device}";
    echo $finalUrl;

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