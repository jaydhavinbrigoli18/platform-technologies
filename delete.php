<?php
$conn = new mysqli('localhost','root','','online_application');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$id = $_GET["id"] ?? null;

if (!$id || !is_numeric($id)) {
    die('Invalid or missing ID. Cannot cancel.');
}


$delete_result = $conn->query("DELETE FROM studentuser WHERE id = $id");

if ($delete_result && $conn->affected_rows > 0) 
{
    $conn->close();
    echo "<div style='background:#f2f2f2; height:50%; width: 500px; display:flex; flex-direction:column; justify-content:center; align-items:center; border-radius: 25px; box-shadow: 0 8px 18px rgba(0,0,0,0.15); position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>";
    echo "<h2 style='text-align:center; margin-top:40px; color:#000;'>Appointment Canceled</h2>";
    echo "<div style='text-align:center; margin-top:20px; '>
    <button  style='padding: 10px; border-radius:15px; border: 1px #000 solid'><a style='text-decoration: none; color:#000' href='index.html'>Go Back to Form</a></button>
          </div>";
} 
else 
{
    $conn->close();
    echo "<div style='background:#F2F2F2; height:50%; width: 550px   ; display:flex; flex-direction:column; justify-content:center; align-items:center; border-radius: 25px; box-shadow: 0 8px 18px rgba(0,0,0,0.15); position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>";
    echo "<h2 style='text-align:center; margin-top:40px; color:red;'>Application not found or already canceled.</h2>";
    echo "<div style='text-align:center; margin-top:20px;'>
            <button style='padding:10px; border:none; border-radius:15px; background: #D9D9D9;'><a style='text-decoration: none; color: #000;' href='index.html'>Go Back to Form</a></button>
          </div>";
    echo "</div>";
}
?>
