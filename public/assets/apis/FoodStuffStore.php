<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "numendb";

$servername = "MYSQL8001.site4now.net";
$username = "a87597_foodstu";
$password = "43TV@BB3w";
$dbname = "db_a87597_foodstu";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$action = $_POST["action"];
$continue = "";

$ch = curl_init();

if ("FETCH_CART" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $status = $_POST["status"];
        $limit = $_POST["limit"];
        $db_data = array();
        $result;
        $sql = "SELECT c.id, f.image, f.name, f.productid, f.price, c.quantity,

                (SELECT productid 
                FROM Likes lk
                WHERE lk.productid = f.productid) as liked

                FROM FoodStuffs f

                INNER JOIN Cart c ON c.productid = f.productid
                WHERE c.useremail = '$email' AND c.accounttype = '$accounttype' AND c.status = '$status'
                ORDER BY c.id DESC
                LIMIT $limit";

        if ($conn->query($sql) == TRUE) {
            $result = $conn->query($sql);
        } else {
            //Report Error
            echo $conn->error;
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}


if ("FETCH_SHOPPING_LIST" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $invoiceid = $_POST["invoiceid"];
        $status = $_POST["status"];
        $limit = $_POST["limit"];
        $db_data = array();
        $result;
        $sql = "SELECT id, name, invoiceid, quantity, price from ShoppingList
                WHERE useremail = '$email' AND accounttype = '$accounttype' AND invoiceid = '$invoiceid' AND status = '$status'
                ORDER BY id DESC
                LIMIT $limit";

        if ($conn->query($sql) == TRUE) {
            $result = $conn->query($sql);
        } else {
            //Report Error
            echo $conn->error;
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_TRACKING_LOG" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $invoiceid = $_POST["invoiceid"];
        $db_data = array();
        $sql = "SELECT id, chapter, message from TrackingLog
                WHERE useremail = '$email' AND accounttype = '$accounttype' AND invoiceid = '$invoiceid'
                ORDER BY id DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_LIKED_FOODSTUFFS" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $limit = $_POST["limit"];
        $db_data = array();
        $sql = "SELECT f.id, f.image, f.name, f.productid, f.price,

                (SELECT productid 
                FROM Likes lk
                WHERE lk.productid = f.productid) as liked

                FROM FoodStuffs f
                JOIN LIKES L ON l.productid = f.productid
                WHERE l.useremail = '$email' AND l.accounttype = '$accounttype'
                ORDER BY l.id DESC
                LIMIT $limit";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_ADDRESSES" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $db_data = array();
        $sql = "SELECT id, address FROM Addresses WHERE useremail ='$email' AND accounttype = '$accounttype' ORDER BY ID DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_BILLING_CARDS" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $db_data = array();
        $sql = "SELECT id, cardnumber, cardholder, expirydate, cvv FROM BillingCards WHERE useremail ='$email' AND accounttype = '$accounttype' ORDER BY ID DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_AFFILIATE_EARNINGS" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $affiliateid = $_POST["affiliateid"];
        $db_data = array();
        $sql = "SELECT id, referredusername, referreduseremail, referredaccounttype, commision, status, serverdatetime FROM AffiliateEarnings WHERE useremail ='$email' AND accounttype = '$accounttype' AND affiliateid = '$affiliateid' ORDER BY ID DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_USER_PROFILE_DATA" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $db_data = array();
    $sql = "SELECT image, phone, username, passphrase, temppin, status, credit, accounttype, affiliateid

     FROM Users WHERE useremail = '$email' AND accounttype = '$accounttype'";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
    }

    echo json_encode($db_data);

    return;
}

if ("FETCH_FOODSTUFF_NAMES" == $action) {
    $db_data = array();
    $sql = "SELECT name FROM FoodStuffs WHERE status = 'active'";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
    }

    echo json_encode($db_data);

    return;
}

if ("PLACE_ORDER" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accountype"];
    $paymentmethod = $_POST["paymentmethod"];
    $ordertype = $_POST["ordertype"];
    $price = $_POST["price"];
    $invoiceid = $_POST["invoiceid"];
    $status = $_POST["status"];
    $budget = $_POST["budget"];
    $address = $_POST["address"];
    $sql1 = "";

    if ($ordertype == "cart") {
        $sql1 = "INSERT INTO Orders (useremail, accounttype, invoiceid, price, ordertype, paymentmethod, status) VALUES('$email', '$accounttype', '$invoiceid', '$price', '$ordertype', '$paymentmethod', '$status')";
    } else if ($ordertype == "requestedinvoice") {
        $sql1 = "INSERT INTO Invoice (useremail, accounttype, invoiceid, address, status, budget) VALUES('$email', '$accounttype', '$invoiceid', '$address', '$status', '$budget')";
    }

    if ($conn->query($sql1) === TRUE) {

        if ($ordertype == "cart") {
            //Set Cart status to closed so items can show up on recently puurchased food stuffs
            $sql2 = "UPDATE Cart SET status ='closed' WHERE useremail ='$email' AND accounttype = '$accounttype' AND invoiceid = '$invoiceid'";
            $conn->query($sql2);

            if ($paymentmethod == "creditbalance") {
                $sql3 = "SELECT credit FROM Users WHERE useremail = '$email' AND accounttype = '$accounttype'";
                $result3 = $conn->query($sql3);

                while ($row = $result3->fetch_assoc()) {
                    $oldcredit = floatval($row["usercredit"]);
                }

                $newcredit =  $oldcredit - floatval($price);

                $sql4 = "UPDATE Users SET credit ='$newcredit' WHERE useremail ='$email' AND accounttype = '$accounttype'";
                $conn->query($sql4);
            }
        }

        //Save to activity
        $sql5 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Successfull purchase, order on it's way. Payment Method: $paymentmethod', 'false', 'transaction')";

        if ($conn->query($sql5) === TRUE) {
            echo "success";
        } else {
            //Report Error
            echo $conn->error;
        }
    }
} else {
    echo $conn->error;
}

if ('DELETE_FUNC' == $action) {
    $id = $_POST['id'];
    $table = $_POST['table'];
    $sql = "DELETE FROM $table WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
}

if ('DELETE_LIKE' == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $productid = $_POST["productid"];
    $sql = "DELETE FROM Likes WHERE useremail = '$email' AND accounttype = '$accounttype' AND productid = '$productid'";
    if ($conn->query($sql) == TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
}

if ("NEW_CART" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $productid = $_POST["productid"];
    $count = 0;

    $sqlx = "SELECT productid FROM Cart WHERE useremail = '$email' AND accounttype = '$accounttype' AND status ='open' AND productid = '$productid'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    if ($count < 1) {

        $sql = "INSERT INTO Cart (useremail, accounttype, productid, status) VALUES ('$email', '$accounttype', '$productid', 'open')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            //Report Error
            echo $conn->error . curl_error($ch) . "no message?";
        }
    } else {
        echo "unique";
    }

    $conn->close();
    return;
}

if ("GOOGLE_SIGN_IN" == $action) {

    $email = $_POST["email"];
    $username = $_POST["username"];
    $userimage = $_POST["userimage"];
    $affiliateid = $_POST["affiliateid"];
    $count = 0;

    $sqlx = "SELECT useremail FROM Users WHERE useremail = '$email' AND accounttype = 'Google'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    if ($count < 1) {

        $sql = "INSERT INTO USERS 
                (useremail, accounttype, username, image, phone, passphrase, temppin, emailverified, affiliateid, UUID)
                VALUES ('$email', 'Google', '$username', '$userimage', '', '', '0000', 'true', '$affiliateid', UUID())";

        if ($conn->query($sql) === TRUE) {

            $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', 'Google', 'Wecome to FoodStuff Store! Visit our website at www.foodstuff.store for helpfull tips and tutorials.', 'false', 'regular')";
            $conn->query($sql2);
            echo "success";

        } else {
            //Report Error
            echo $conn->error;
        }
    } else {
        echo "success";
    }

    $conn->close();
    return;
}

if ("FETCH_ONE_WHERE" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $table = $_POST["table"];
    $table = $_POST["table"];
    $select = $_POST["select"];
    $columnname = $_POST["columnname"];
    $columnvalue = $_POST["columnvalue"];
    $sql = "SELECT $select FROM $table WHERE $columnname = '$columnvalue'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen) VALUES ('$email', '$accounttype', 'A password reset was requested on your account.', 'false', 'security')";
        $conn->query($sql2);
        echo $row[$select];
    }

    $conn->close();
    return;
}

if ("FETCH_TWO_WHERE" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $table = $_POST["table"];
    $select = $_POST["select"];
    $columnname1 = $_POST["columnname1"];
    $columnvalue1 = $_POST["columnvalue1"];
    $columnname2 = $_POST["columnname2"];
    $columnvalue2 = $_POST["columnvalue2"];
    $sql = "SELECT $select FROM $table WHERE $columnname1 = '$columnvalue1' AND $columnname2 = '$columnvalue2'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'A password reset was requested on your account.', 'false', 'security')";
        $conn->query($sql2);
        echo $row[$select];
    }

    $conn->close();
    return;
}

if ("SIGN_UP" == $action) {

    $email = $_POST["email"];
    $passphrase = $_POST["passphrase"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $temppin = $_POST["temppin"];
    $affiliateid = $_POST["affiliateid"];
    $count = 0;

    $sqlx = "SELECT useremail FROM Users WHERE useremail = '$email' AND accounttype = 'Regular'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    if ($count < 1) {

        $sql = "INSERT INTO USERS 
                (useremail, accounttype, username, image, phone, passphrase, temppin, emailverified, affiliateid, UUID)
                VALUES ('$email', 'Regular', '$username', 'Default', '$phone', '$passphrase', '$temppin', 'false', '$affiliateid', UUID())";

        if ($conn->query($sql) === TRUE) {

            $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', 'Regular', 'Wecome to FoodStuff Store! Visit our website at www.foodstuff.store for helpfull tips and tutorials.', 'false', 'regular')";
            $conn->query($sql2);
            echo "success";

        } else {
            //Report Error
            echo $conn->error;
        }
    } else {
        echo "unique";
    }

    $conn->close();
    return;
}

if ("NEW_INVOICE" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $invoiceid = $_POST["invoiceid"];
    $address = $_POST["address"];
    $budget = $_POST["budget"];
    $fullname = $_POST["username"];
    
    $sql = "INSERT INTO Invoices (useremail, accounttype, invoiceid, fullname, address, budget, status) VALUES ('$email', '$accounttype', '$invoiceid', '$fullname', '$address', '$budget', 'pending')";

    if ($conn->query($sql) === TRUE) {

        $sql2 = "UPDATE ShoppingList SET Status ='closed' WHERE useremail ='$email' AND accounttype = '$accounttype'";
        $conn->query($sql2);       
        
        $sql3 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Invoice($invoiceid) requested successfully and pending approval. You will be notified via email and via your phone number of dispatch requirements within 48 hours.', 'false', 'transaction')";

        if ($conn->query($sql3) === TRUE) {
            echo "success";
        } else {
            echo "success";
        }

    } else {
        //Report Error
        echo $conn->error;
    }

    $conn->close();
    return;
}

if ("NEW_PAYMENT" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $credit = $_POST["credit"];
    $orderid = $_POST["orderid"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $paymentmethod = $_POST["paymentmethod"];
    $totalprice = $_POST["totalprice"];
    $iscartorder = $_POST["iscartorder"];
    $isinvoicepayment = $_POST["isinvoicepayment"];
    
    $sql = "UPDATE Users SET Credit ='$credit' WHERE useremail ='$email' AND accounttype = '$accounttype'";

    if ($conn->query($sql) === TRUE) {

        if($iscartorder == "true"){
            $sql2 = "UPDATE Cart SET Status ='closed', OrderID = '$orderid' WHERE useremail ='$email' AND accounttype = '$accounttype' AND status = 'open'";
        $conn->query($sql2);  
        }     
        
        $sql3 = "";

        if($iscartorder == "true"){
            $sql4 = "INSERT INTO Invoices (useremail, accounttype, invoiceid, fullname, address, budget, status) VALUES ('$email', '$accounttype', '$orderid', '$username', '$address', '$budget', 'approved')";
            $conn->query($sql4);
            $sql3 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Thank you for your order($orderid). You will be notified via email and via your phone number of dispatch requirements within 1 hours.', 'false', 'transaction')";
        }
        else if($isinvoicepayment == "true"){
            $sql5 = "UPDATE Invoices SET Status ='dispatched' WHERE useremail ='$email' AND accounttype = '$accounttype' AND status = 'approved' AND InvoiceID = '$orderid'";
            $conn->query($sql5); 
            $sql3 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Thank you for closing this invoice($orderid). You package is on it's way and will arrive within 3days.', 'false', 'transaction')";
        }else{
            $sql3 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'You have successfully deposited $totalprice NGN in your FoodStuff Store account balance.', 'false', 'transaction')";
        }
        

        if ($conn->query($sql3) === TRUE) {
            echo "success";
        } else {
            echo "success";
        }

    } else {
        //Report Error
        echo $conn->error;
    }

    $conn->close();
    return;
}

if ("NEW_SHOPPING_LIST_ITEM" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $invoiceid = $_POST["invoiceid"];
    $name = $_POST["name"];
    $count = 0;

    $sqlx = "SELECT name FROM ShoppingList WHERE useremail = '$email' AND accounttype = '$accounttype' AND name = '$name' AND invoiceid = '$invoiceid'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    if ($count < 1) {

        $sql = "INSERT INTO ShoppingList (useremail, accounttype, name, invoiceid, quantity) VALUES ('$email', '$accounttype', '$name', '$invoiceid', '1')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            //Report Error
            echo $conn->error;
        }
    } else {
        echo "unique";
    }

    $conn->close();
    return;
}

if ("NEW_ADDRESS" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $address = $_POST["address"];
    $count = 0;

    $sqlx = "SELECT address FROM Addresses WHERE useremail = '$email' AND accounttype = '$accounttype' AND address = '$address'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    if ($count < 1) {
        $sql = "INSERT INTO Addresses (useremail, accounttype, address) VALUES ('$email', '$accounttype', '$address')";

        if ($conn->query($sql) === TRUE) {
            $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'The following pickup address: $address - was added to your account successfully!', 'false', 'security')";
            $conn->query($sql2);
            echo "success";
        } else {
            //Report Error
            echo $conn->error;
        }
        $conn->close();
    } else {
        echo "unique";
    }


    return;
}

if ("NEW_LIKE" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $productid = $_POST["productid"];

    $sqlx = "SELECT productid FROM Likes WHERE useremail = '$email' AND accounttype = '$accounttype' AND productid = '$productid'";
    $resultx = $conn->query($sqlx);
    $count = floatval($resultx->num_rows);

    try {
        if ($count < 1) {

            $sql = "INSERT INTO LIKES (useremail, accounttype, productid) VALUES ('$email', '$accounttype', '$productid')";

            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                //Report Error
                echo $conn->error;
            }
        }else{
            echo "success";
        }
    } catch (PDOException $e) {
        //Report Error
    }

    
    $conn->close();
    return;
}


if ("CHANGE_PASSPHRASE" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $passphrase = $_POST["passphrase"];
    $sql = "UPDATE Users SET Passphrase ='$passphrase' WHERE useremail ='$email' AND accounttype = '$accounttype'";

    if ($conn->query($sql) === TRUE) {
        //Save to activity
        $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Password updated successfully!', 'false', 'security')";

        if ($conn->query($sql2) === TRUE) {
            echo "success";
        } else {
            //Report Error
            echo $conn->error;
        }
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("EDIT_PROFILE_INFO" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $sql = "UPDATE Users SET username ='$username', phone ='$phone'  WHERE useremail ='$email' AND accounttype = '$accounttype'";

    if ($conn->query($sql) === TRUE) {
        //Save to activity
        $sql2 = "INSERT INTO Activity (useremail, accounttype, message, seen, type) VALUES ('$email', '$accounttype', 'Profile info updated successfully!', 'false', 'security')";

        if ($conn->query($sql2) === TRUE) {
            echo "success";
        } else {
            //Report Error
            echo $conn->error;
        }
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("UPDATE_CART_ITEM_QUANTITY" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $quantity = $_POST["quantity"];
    $productid = $_POST["productid"];
    $sql = "UPDATE Cart SET Quantity ='$quantity' WHERE useremail ='$email' AND accounttype = '$accounttype' AND productid = '$productid'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("UPDATE_SHOPPING_LIST_ITEM_QUANTITY" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $quantity = $_POST["quantity"];
    $name = $_POST["name"];
    $sql = "UPDATE ShoppingList SET Quantity ='$quantity' WHERE useremail = '$email' AND accounttype = '$accounttype' AND name = '$name' ";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("SEEN_ACTIVITY" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $sql = "UPDATE Activity SET Seen ='true' WHERE useremail ='$email' AND accounttype = '$accounttype' AND seen = 'false'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("UPDATE_TEMPPIN" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $temppin = $_POST["temppin"];
    $sql = "UPDATE Users SET TempPin ='$temppin' WHERE useremail ='$email' AND accounttype = '$accounttype'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        //Report Error
        echo $conn->error;
    }
    $conn->close();
    return;
    $conn->close();
}

if ("FETCH_ACTIVITY" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $db_data = array();
        $sql = "SELECT id, message, seen, serverdatetime, type FROM Activity WHERE useremail ='$email' AND accounttype = '$accounttype' ORDER BY ID DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_INVOICE" == $action) {
    try {
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $selectedinvoicestatus = $_POST["selectedinvoicestatus"];
        $db_data = array();

        $sql = "SELECT id, address, invoiceid, budget, status, serverdatetime, total FROM Invoices WHERE useremail ='$email' AND accounttype = '$accounttype' AND status = '$selectedinvoicestatus' ORDER BY ID DESC";

        if($selectedinvoicestatus == "all"){
            $sql = "SELECT id, address, invoiceid, budget, status, serverdatetime, total FROM Invoices WHERE useremail ='$email' AND accounttype = '$accounttype' ORDER BY ID DESC";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

if ("FETCH_ALL_FOODSTUFFS" == $action) {
    try {
        $category = $_POST["category"];
        $email = $_POST["email"];
        $accounttype = $_POST["accounttype"];
        $status = $_POST["status"];
        $limit = $_POST["limit"];
        $randomlist = $_POST["randomlist"];
        $db_data = array();

        if($category == "All"){
            $sql = "SELECT f.id, f.image, f.name, f.productid, f.price,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked
        
                FROM FoodStuffs f 
         
                WHERE f.status = '$status' 
                ORDER BY f.id DESC LIMIT $limit";

        if ($randomlist == "true") {
            $sql = "SELECT id, image, name, productid, price,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

            (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked
            
            FROM FoodStuffs f
            
            WHERE f.status = '$status'
            
            ORDER BY RAND() DESC LIMIT $limit";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);

        }else{
            $sql = "SELECT f.id, f.image, f.name, f.productid, f.price,

            (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked
        
                FROM FoodStuffs f 
         
                WHERE f.status = '$status' AND f.category = '$category' 
                ORDER BY f.id DESC LIMIT $limit";

        if ($randomlist == "true") {
            $sql = "SELECT id, image, name, productid, price,

            (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

            (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked
            
            FROM FoodStuffs f
            
            WHERE f.status = '$status' AND f.category = '$category' 
            
            ORDER BY RAND() DESC LIMIT $limit";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);

        }
        
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

//Fetch app default data
if ("FETCH_APP_DEFAULT_DATA" == $action) {
    $data = $_POST["data"];
    $sql = "SELECT VariableValue FROM AppDefault WHERE VariableName ='$data'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo $row["VariableValue"];
    }
    return;
}

//Fetch app default data
if ("CALCULATE_CART_SUBTOTAL" == $action) {
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];
    $status = $_POST["status"];
    $sql = "SELECT SUM(Cart.Quantity * Foodstuffs.Price) 
            AS SubTotal 
            FROM Cart 
            INNER JOIN Foodstuffs on Foodstuffs.productid = Cart.productid 
            WHERE Cart.useremail = '$email' AND Cart.accounttype = '$accounttype' AND Cart.status = '$status'";
    $result = $conn->query($sql) or die($conn->error);

    while ($row = $result->fetch_assoc()) {
        echo $row["SubTotal"];
    }
    return;
}

//Counting action1
if ("COUNTING_ACTION_WHERE1" == $action) {
    $context = $_POST["context"];
    $table = $_POST["table"];
    $Column = $_POST["column"];
    $sql = "SELECT $Column FROM $table WHERE $Column ='$context'";
    $result = $conn->query($sql);
    echo $result->num_rows;
    $conn->close();
    return;
}

//Counting action2
if ("COUNTING_ACTION_WHERE2" == $action) {
    $contextA = $_POST["contextA"];
    $contextB = $_POST["contextB"];
    $table = $_POST["table"];
    $ColumnA = $_POST["columnA"];
    $ColumnB = $_POST["columnB"];
    $sql = "SELECT $ColumnA FROM $table WHERE $ColumnA ='$contextA' AND $ColumnB ='$contextB'";
    $result = $conn->query($sql);
    echo $result->num_rows;
    $conn->close();
    return;
}

//Counting action3
if ("COUNTING_ACTION_WHERE3" == $action) {
    $contextA = $_POST["contextA"];
    $contextB = $_POST["contextB"];
    $contextC = $_POST["contextC"];
    $table = $_POST["table"];
    $ColumnA = $_POST["columnA"];
    $ColumnB = $_POST["columnB"];
    $ColumnC = $_POST["columnC"];
    $sql = "SELECT $ColumnA FROM $table WHERE $ColumnA ='$contextA' AND $ColumnB ='$contextB' AND $ColumnC ='$contextC'";
    $result = $conn->query($sql);
    echo $result->num_rows;
    $conn->close();
    return;
}

//Counting action3
if ("COUNTING_ACTION_WHERE4" == $action) {
    $contextA = $_POST["contextA"];
    $contextB = $_POST["contextB"];
    $contextC = $_POST["contextC"];
    $contextC = $_POST["contextD"];
    $table = $_POST["table"];
    $ColumnA = $_POST["columnA"];
    $ColumnB = $_POST["columnB"];
    $ColumnC = $_POST["columnC"];
    $ColumnC = $_POST["columnD"];
    $sql = "SELECT $ColumnA FROM $table WHERE $ColumnA ='$contextA' AND $ColumnB ='$contextB' AND $ColumnC ='$contextC' AND $ColumnD ='$contextD'";
    $result = $conn->query($sql);
    echo $result->num_rows;
    $conn->close();
    return;
}

if ("SEARCH_FOR_FOODSTUFF" == $action) {
    //Save searched keyword first
    $isallcategory = $_POST["isallcategory"];
    $limit = $_POST["limit"];
    $keyword = $_POST["keyword"];
    $status = $_POST["status"];
    $category = $_POST["category"];
    $email = $_POST["email"];
    $accounttype = $_POST["accounttype"];

    $sqlc = "SELECT Occurence FROM SearchKeyword WHERE Keyword ='$keyword'";
    $resultc = $conn->query($sqlc);
    $count = floatval($resultc->num_rows);

    try {
        if ($count > 0) {
            while ($row = $resultc->fetch_assoc()) {
                $count = floatval($row['Occurence']) + 1;
            }

            $sqlc2 = "UPDATE SearchKeyword SET Occurence ='$count ' WHERE Keyword ='$keyword'";
            $conn->query($sqlc2);
        } else {
            $sqlc2 = "INSERT INTO SearchKeyword (Occurence, Keyword, Saved) VALUES ('1', '$keyword', 'false')";
            $conn->query($sqlc2);
        }
    } catch (PDOException $e) {
        //Report Error
    }

    try {
        $db_data = array();

        $sql = "SELECT f.id, f.image, f.name, f.productid, f.price,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked

            FROM FoodStuffs f 

            WHERE status = '$status' AND category = '$category' AND (f.name LIKE '%$keyword%' OR f.price LIKE '%$keyword%' OR f.tags LIKE '%$keyword%')
    
            ORDER BY id DESC LIMIT $limit";

        if ($isallcategory == "true") {
            $sql = "SELECT f.id, f.image, f.name, f.productid, f.price,

                (SELECT productid 
                FROM Likes l
                WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as quantity,

                    (SELECT productid 
                    FROM Likes l
                    WHERE l.productid = f.productid AND l.useremail = '$email' AND l.accounttype = '$accounttype') as liked
            
                    FROM FoodStuffs f 

                WHERE status = '$status' AND (f.name LIKE '%$keyword%' OR f.price LIKE '%$keyword%' OR f.category LIKE '%$keyword%' OR f.tags LIKE '%$keyword%')
                
                ORDER BY id DESC LIMIT $limit";
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $db_data[] = $row;
            }
        }
        //Send back the complete records as a json
        echo json_encode($db_data);
    } catch (PDOException $e) {
        //Report Error
        echo $e;
    }
    $conn->close();
    return;
}

?>