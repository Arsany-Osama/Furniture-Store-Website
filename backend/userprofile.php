<?php
    include_once('../../../furniture/database/src/database.php');
    $database = new database();

    $UserId=$database->getUserIdByEmail($_COOKIE['Email']);

    $addresses=$database->getUserAddresses($UserId);

    $LastProduct=$database->getLastPurchasedProduct($UserId);
    if (!$LastProduct) {
        $LastProduct['product_name'] ='Empty';
        $LastProduct['total_boughts']=0;
    } 
    
    $TotalSpendings=$database->getTotalSpending($UserId);
    
    $HighestProduct=$database->getHighestPricedProduct($UserId);
    if (!$HighestProduct) {
        $HighestProduct['product_name']='Empty';
        $HighestProduct['price']=0;
    }
    ?>