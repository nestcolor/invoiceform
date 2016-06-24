<?php

// create db exemplar class
$db = new DB($dataFolder,'db_file.db');

if ($_POST){
    // if post method add form value to DB
    $db->add_mail($_POST);
}

// sent to browser attr list
$listCompany = $db->list_company();
?>
    <script type="text/javascript" language="javascript">
        lists = "<?php echo str_replace(array("'", '"'), array("\'", '\"'), json_encode($listCompany)); ?>";
    </script>
<?php



