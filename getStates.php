<?php
require("app/app.php");
$countryId = $_POST["country"];
if(filter_var($countryId,FILTER_VALIDATE_INT)){
    $sql = "SELECT * FROM states WHERE countryID = :countryID ORDER BY state";
    $smt = $dba->prepare($sql);
    $smt->bindParam(":countryID",$countryId);
    $smt->execute();
    $state = $smt->fetchAll();
    echo "<option selected hidden disabled>Select state ...</option>";
    foreach($state as $state) {
        echo "<option value='".$state['id']."'>".$state['state']."</option>";
    }
} else {
    echo "<option selected disabled hidden>Failed to load states!</option>";
}