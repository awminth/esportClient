<?php 

include("config.php");
$action=$_POST["action"];

if($action=="save"){
    $usergp = "a";
    $serverid = date("YmdHis");
    $username=$_POST["username"];
    $password=$_POST["password"];
    $agentid=$_POST["agentid"];
    $agentname=GetString("select UserName from tblagent where AID='{$agentid}'");
    $displayname = $_POST["displayname"];
    $dt = (new DateTime())->format('Y-m-d H:i:s');
    //Send data to API
    $url = "https://ex-api-demo-yy.568win.com/web-root/restricted/player/register-player.aspx"; // Replace with your API URL

    $data = [
        "CompanyKey" => $companykey,
        "ServerId" => $serverid,
        "Username" => $username,
        "Agent" => $agentname,
        "UserGroup" => "a",
        "DisplayName" => $displayname,
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

    // Set transaction isolation level and begin transaction
    mysqli_query($con, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    mysqli_begin_transaction($con);

    try{
        // Check for 'msg'
        if (isset($data['error']['msg'])) {
            if($data['error']['msg']=="No Error" && $data['error']['id']==0){
                //insert local database
                $sql = "insert into tblplayer (CompanyKey,ServerID,UserName,Password,AgentName,AgentID,
                UserGroup,DisplayName,DT) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $con->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Prepare failed" . $con -> error);
                }

                $stmt->bind_param("sssssisss",$companykey, $serverid, $username, $password, $agentname, 
                                    $agentid, $usergp, $displayname, $dt);
  

                if ($stmt->execute()) {
                    mysqli_commit($con);
                    echo 1;
                }
                else{
                    mysqli_rollback($con);
                    echo 0;
                }
            }
            else{
                mysqli_rollback($con);
                echo $data['error']['msg'];
            }       
        } 
        else {
            mysqli_rollback($con);
            echo 2;
        }  
    }
    catch(mysqli_sql_exception $e){
        mysqli_rollback($con);
        error_log("error in database".$e -> getMessage());
        echo 0;
    }
    catch(Exception $e){
        mysqli_rollback($con);
        error_log("error in system".$e -> getMessage());
        echo 0;
    } 
}

?>