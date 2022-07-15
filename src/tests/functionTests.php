
<?php


function getDataExecutionTime()
{
    include('conn.php');
    require_once('../php/CreateDb.php');
    $serviceID = 1030;
    $database = new CreateDb();
    $start_timestamp = microtime(true);
    $database->getData();
   
   
   
   
    $end_timestamp = microtime(true);
    $duration = $end_timestamp - $start_timestamp;
    $durationTime = $duration * 10000;
    $title = "getData Execution time Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $Result = "PASS";
    $log = "getData Execution took " . $durationTime . " milliseconds.\n";
    $sqlquery = "INSERT INTO argus_methodTimeTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$durationTime','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

getDataExecutionTime();

function componentExecutionTime()
{
    include('conn.php');
    require_once('../php/component.php');
    $serviceID = 1030;
    $productname = "Apple Macbook Pro";
    $productprice = "1799";
    $productimg = "http://cmcgee17.lampt.eeecs.qub.ac.uk/shopping/src/upload/product1.png";
    $productid = 1;
    $start_timestamp = microtime(true);
    component($productname, $productprice, $productimg, $productid);
    $end_timestamp = microtime(true);
    $duration = $end_timestamp - $start_timestamp;
    $durationTime = $duration * 10000;
    $title = "Component Function Execution time Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $Result = "PASS";
    $log = "Component Function Execution took " . $durationTime . " milliseconds.\n";
    $sqlquery = "INSERT INTO argus_methodTimeTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$durationTime','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

componentExecutionTime();

function cartElementExecutionTime()
{
    include('conn.php');
    require_once('../php/component.php');
    $serviceID = 1030;
    $productname = "Apple Macbook Pro";
    $productprice = "1799";
    $productimg = "http://cmcgee17.lampt.eeecs.qub.ac.uk/shopping/src/upload/product1.png";
    $productid = 1;
    $start_timestamp = microtime(true);
    cartElement($productname, $productprice, $productimg, $productid);
    $end_timestamp = microtime(true);
    $duration = $end_timestamp - $start_timestamp;
    $durationTime = $duration * 10000;
    $title = "Carl Element Function Execution time Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $Result = "PASS";
    $log = "Cart Element Function Execution took " . $durationTime . " milliseconds.\n";
    $sqlquery = "INSERT INTO argus_methodTimeTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$durationTime','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

cartElementExecutionTime();

function addProductExecutionTime()
{
    include('conn.php');
    $serviceID = 1030;
    $productname = "Iphone 11";
    $productprice = "699";
    $productimg = "http://cmcgee17.lampt.eeecs.qub.ac.uk/shopping/src/upload/product1.png";
    $start_timestamp = microtime(true);
    $sqlquery1 = "INSERT INTO Productdb (id,product_name,product_price,product_image) 
    VALUES(NULL,'$productname',$productprice,'$productimg');";
    $result1 = $conn->query($sqlquery1);
    if (!$result1) {
        echo $conn->error;
    }
    $end_timestamp = microtime(true);
    $duration = $end_timestamp - $start_timestamp;
    $durationTime = $duration * 10000;
    $title = "Add New Product Execution time Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $Result = "PASS";
    $log = "Add New Product Function Execution took " . $durationTime . " milliseconds.\n";
    $sqlquery = "INSERT INTO argus_methodTimeTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$durationTime','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
    $sqlquery2 = "DELETE FROM Productdb WHERE product_name = '$productname';";
    $result2 = $conn->query($sqlquery2);
    if (!$result2) {
        echo $conn->error;
    }
}
addProductExecutionTime();


function deleteProductExecutionTime()
{
    include('conn.php');
    $serviceID = 1030;
    $productname = "Iphone 11";
    $start_timestamp = microtime(true);
    $sqlquery1 = "DELETE FROM Productdb WHERE product_name = '$productname';";
    $result1 = $conn->query($sqlquery1);
    if (!$result1) {
        echo $conn->error;
    }
    $end_timestamp = microtime(true);
    $duration = $end_timestamp - $start_timestamp;
    $durationTime = $duration * 10000;
    $title = "Delete Product Execution time Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $Result = "PASS";
    $log = "Delete Product Function Execution took " . $durationTime . " milliseconds.\n";
    $sqlquery = "INSERT INTO argus_methodTimeTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$durationTime','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

deleteProductExecutionTime();


//correct method result tests



function getDataCorrectResult()
{
    include('conn.php');
    require_once('../php/CreateDb.php');
    $serviceID = 1030;
    $database = new CreateDb();
    $expected = $database->getData();
    $actual = $database->getData();
    if ($expected == $actual) {
        $correctResult = true;
        $Result = "PASS";
        $log = "PASSED: getData function returned correct result";
    } else {
        $correctResult = false;
        $Result = "FAIL";
        $log = "FAILED: getData function returned incorrect result";
    }
    $title = "getData Correct Result Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $sqlquery = "INSERT INTO argus_methodTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$correctResult','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

getDataCorrectResult();


function productAddedResult()
{
    include('conn.php');
    $serviceID = 1030;
    $productAdded;
    $productname = "Iphone 12";
    $productprice = "600";
    $productimg = "http://cmcgee17.lampt.eeecs.qub.ac.uk/shopping/src/upload/product1.png";
    $sqlquery1 = "INSERT INTO Productdb (id,product_name,product_price,product_image) 
    VALUES(NULL,'$productname',$productprice,'$productimg');";
    $result1 = $conn->query($sqlquery1);
    if (!$result1) {
        echo $conn->error;
    }
    $sqlquery2 = "SELECT * FROM Productdb WHERE product_name = '$productname'";
    $result2 = $conn->query($sqlquery2);
    if ($result2->num_rows > 0) {
        $Result = "PASS";
        $log = "PASSED: Product successfully added";
        $productAdded = true;
    } else {
        $Result = "FAIL";
        $log = "FAILED: Product was not added";
        $productAdded = false;
    }
    $title = "productAdded Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $sqlquery = "INSERT INTO argus_methodTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$productAdded','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }

    $sqlquery3 = "DELETE FROM Productdb WHERE product_name = '$productname';";
    $result3 = $conn->query($sqlquery3);
    if (!$result3) {
        echo $conn->error;
    }
}

productAddedResult();



function productDeletedResult()
{
    include('conn.php');
    $serviceID = 1030;
    $productDeleted;
    $productname = "Test Product";
    $productprice = "600";
    $productimg = "http://cmcgee17.lampt.eeecs.qub.ac.uk/shopping/src/upload/product1.png";
    $sqlquery1 = "INSERT INTO Productdb (id,product_name,product_price,product_image) 
    VALUES(NULL,'$productname',$productprice,'$productimg');";
    $result1 = $conn->query($sqlquery1);
    if (!$result1) {
        echo $conn->error;
    }
    $sqlquery2 = "DELETE FROM Productdb WHERE product_name = '$productname'";
    $result2 = $conn->query($sqlquery2);
    if (!$result2) {
        echo $conn->error;
    }

    $sqlquery3 = "SELECT * FROM Productdb WHERE product_name = '$productname'";
    $result3 = $conn->query($sqlquery3);
    if ($result3->num_rows > 0) {
        $Result = "FAIL";
        $log = "FAILED: Product was not deleted";
        $productDeleted = false;
    } else {
        $Result = "PASS";
        $log = "PASSED: Product was successfully deleted";
        $productDeleted = true;
    }
    $title = "productDeleted Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $sqlquery = "INSERT INTO argus_methodTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$productDeleted','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

productDeletedResult();



function createDbClassConstructTest()
{
    include('conn.php');
    require_once('../php/CreateDb.php');
    $serviceID = 1030;
    $database = new CreateDb();
    $database2 = new CreateDb();
    $databaseConstruct;
    if($database == $database2){
        $Result = "PASS";
        $log = "PASSED: CreateDb Class construct working correctly";
        $databaseConstruct = true;

    }else{
        $Result = "FAIL";
        $log = "FAILED: CreateDb Class construct failed";
        $databaseConstruct = false;
    }

    $title = "CreateDb Construct Test";
    date_default_timezone_set("Europe/London");
    $date = date("Y-m-d H:i:s");
    $timeStamp = $date;
    $sqlquery = "INSERT INTO argus_methodTests (testID,testName,serviceID,Data,Result,TimeStamp,log) 
    VALUES(NULL,'$title',$serviceID,'$databaseConstruct','$Result','$timeStamp','$log');";
    $result = $conn->query($sqlquery);
    if (!$result) {
        echo $conn->error;
    }
}

createDbClassConstructTest();
