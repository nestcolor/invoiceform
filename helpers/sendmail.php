<?php

// send mail block
if($_POST){
	// who send mail
	if (isset($_POST['sendTo'])){
		$formSendto = strip_tags($_POST['sendTo']);
	} else {
		$formSendto = 1;
	}
	// if set attention
	$attention = 0;
	if (isset($_POST['attention'])){
		if($_POST['attention'] === '1'){
			$attention = 1;
		}
	}

	$mail->Subject = $lang['page_title'];
	$mail->CharSet = "UTF-8";

	// add attachment file
	if ($f_name = $_FILES["attachmentFile"]["name"]){
		$tmp_name = $_FILES["attachmentFile"]["tmp_name"];
		$t_name = sys_get_temp_dir().DIRECTORY_SEPARATOR.$f_name;
		move_uploaded_file($tmp_name, $t_name);
		$mail->AddAttachment($t_name);
	}

	if ($formSendto !== 1 ) {
		// send to bookkeeper
		$mail->addAddress($bookkeeperEmail, $bookkeeperName);

		$body = $lang['invoiceCenter'].': '. strip_tags($_POST['invoiceCenter']).'<br>'.
		$lang['payment'].': '. strip_tags($_POST['payment']).'<br>'.
		$lang['dMessage'].': '. strip_tags($_POST['dMessage']).'<br>'.
		$lang['bookLike'].': '. strip_tags($_POST['bookLike']).'<br>'.
		$lang['yMessage'].': '. strip_tags($_POST['yMessage']).'<br>';
		// add attention flag
		if ($attention) $body ="##LET OP ##<br>".$body;
		$mail->Body = $body;

		$mail->IsHTML(true);
		$mail->Send();
	} else  {
		// send to bookkeeper and customer
		$mail->addAddress(strip_tags($_POST['contactMail']),strip_tags( $_POST['contactName']));

		$body = $lang['company'].': '. strip_tags($_POST['company']).'<br>'.
		$lang['contactName'].': '. strip_tags($_POST['contactName']).'<br>'.
		$lang['invoiceCenter'].': '. strip_tags($_POST['invoiceCenter']).'<br>'.
		$lang['payment'].': '. strip_tags($_POST['payment']).'<br>'.
		$lang['dMessage'].': '. strip_tags($_POST['dMessage']).'<br>'.
		$lang['bookLike'].': '. strip_tags($_POST['bookLike']).'<br>'.
		$lang['yMessage'].': '. strip_tags($_POST['yMessage']).'<br>';
		$mail->Body = $body;
		$mail->IsHTML(true);
		// now send to customer
		$mail->Send();

		$mail->ClearAddresses();
		// add attention flag
		$mail->addAddress($bookkeeperEmail, $bookkeeperName);
		if ($attention) $body ="##LET OP ##<br>".$body;

		$mail->Body = $body;
		$mail->IsHTML(true);
		// now send to bookkeeper
		$mail->Send();
	}
}

