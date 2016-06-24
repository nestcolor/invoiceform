<?php
//init script
require ('helpers/autoload.php');

?>
<!DOCTYPE html>

<html>
<head>
    <title><?php echo $lang['page_title']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="<?php echo $lang['page_keywords']; ?>">
    <meta name="description" content="<?php echo $lang['page_description']; ?>">
    <meta name="author" content="Schneider Webdesign">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
    <div class="wrapper col-lg-12">
        <div id="contact-form" class="col-lg-12">

            <h3><?php echo $lang['form_title']; ?></h3>

	        <div id="mail-status"></div>

		    <form id="frmContact" action="" method="post" enctype="multipart/form-data">
				<div class="col-lg-8">
                    <div class="form-group">
                        <div class=db"col-lg-12" data-toggle="buttons">
                            <label  class="btn btn-primary">
                                <input id="andCustomer" name="sendTo" value="1" type="radio"><?php echo $lang['SendToBookkeeperCustomer']; ?>
                            </label>
                            <label  class="btn btn-primary">
                                <input id="onlyBookkeeper" name="sendTo" value="2" type="radio"><?php echo $lang['SendToBookkeeper']; ?>
                            </label>
                        </div>
                    </div>
					<br>
					<br>
                    <div class="form-group company">
                        <label class="col-lg-2 control-label"><?php echo $lang['company']; ?>:</label>
                        <div class="col-lg-10">
                            <input list="list-display" required name="company" placeholder="<?php echo $lang['company']; ?>" value='<?php echo $company ?>' autofocus type="text">
                            <datalist id="list-display">
                                <?php foreach($listCompany as $item): ?>
                                <option><?php echo $item['company']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group contactName">
                        <label class="col-lg-2 control-label"><?php echo $lang['contactName']; ?>:</label>
                        <div class="col-lg-10">
                            <input required name="contactName" placeholder="<?php echo $lang['contactName']; ?>" value='<?php echo $contactName ?>' type="text">
                        </div>
                    </div>
                    <div class="form-group contactMail">
                        <exemplarlabel class="col-lg-2 control-label"><?php echo $lang['contactMail']; ?>:</exemplarlabel>
                        <div class="col-lg-10">
                            <input required name="contactMail" placeholder="<?php echo $lang['contactMail']; ?>" value='<?php echo $contactMail ?>' type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['attachmentFile']; ?>:</label>
                        <div class="col-lg-10">
                            <input name="attachmentFile" id="attachmentFile" onchange="getFileName();" placeholder="<?php echo $lang['attachmentFile']; ?>" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['invoiceCenter']; ?>:</label>
                        <div class="col-lg-10">
                            <input name="invoiceCenter" id="invoiceCenter" placeholder="<?php echo $lang['invoiceCenter']; ?>" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['payment']; ?>:</label>
                        <div class="col-lg-10">
			                <?php get_file('payment', $dataFolder); ?>
							<span class="paypalMemo"><?php echo $lang['paypalMemo']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['dMessage']; ?>:</label>
                        <div class="col-lg-10">
			                <?php get_file('dMessage', $dataFolder);	?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['attention']; ?>:</label>
                        <div class="col-lg-10">
	                        <div class="col-lg-12" data-toggle="buttons">
	                            <label  class="btn btn-primary">
	                                <input name="attention" value="1" type="radio"><?php echo $lang['yes']; ?>
	                            </label>
	                            <label  class="btn btn-primary">
	                                <input name="attention" value="0" type="radio"><?php echo $lang['no']; ?>
	                            </label>
	                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo $lang['yMessage']; ?>:</label>
                        <div class="col-lg-10">
                            <input name="yMessage" placeholder="<?php echo $lang['yMessage']; ?>"  type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
						    <button name="submit" class="col-lg-2 btn btn-success" type="submit" id="contact-submit"><?php echo $lang['submit']; ?></button>
						    <button name="reset" class="col-lg-2 btn btn-danger" type="reset" id="contact-reset"><?php echo $lang['reset']; ?></button>
						    <div class="col-lg-2" id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
                        </div>
                    </div>
				</div>
				<div class="col-lg-4">
                    <div class="form-group rightCol">
                        <label class="col-lg-12 control-label"><?php echo $lang['bookLike']; ?>:</label>
                        <div class="col-lg-12">
			                <?php get_file('bookLike',$dataFolder); ?>
                        </div>
                    </div>
				</div>
		    </form>
        </div>
    </div>

    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 
 	<!-- necessary for form -->
    <script src="js/scripts.js" type="text/javascript"></script>
   
    
</body>
</html>
