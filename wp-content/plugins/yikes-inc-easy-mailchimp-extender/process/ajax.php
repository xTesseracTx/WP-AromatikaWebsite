<?php
/*
This page gets included from lib.ajax and then processes
the post. This page should never get called by itself.
*/
if(!empty($_POST)
&& isset($_POST['form_action']))
	{	
	switch($_POST['form_action'])
		{
		
		
		
default:
	echo '-1';
	break;
	
case 'update_options':
	$action	= $yksemeBase->updateOptions($_POST);
	if($action)
		{
		echo '1';
		}
	else echo '-1';
	break;

case 'list_add':
	$list	= $yksemeBase->addList($_POST['list_id'], $_POST['name']);
	if($list)
		{
		echo json_encode($list);
		}
	else echo '-1';
	break;

	
case 'list_update':
	$action	= $yksemeBase->updateList($_POST);
	if($action)
		{
		echo '1';
		}
	else echo '-1';
	break;
	
case 'list_sort':
	$action	= $yksemeBase->sortList($_POST);
	if($action)
		{
		echo '1';
		}
	else echo '-1';
	break;
	
case 'list_delete':
	$action	= $yksemeBase->deleteList($_POST['id']);
	if($action)
		{
		echo '1';
		}
	else echo '-1';
	break;
	
case 'list_import':
	$list	= $yksemeBase->importList($_POST['id']);
	if($list)
		{
		echo json_encode($list);
		}
	else echo '-1';
	break;

case 'frontend_submit_form':
	$action	= $yksemeBase->addUserToMailchimp($_POST);
	if($action  == "done")
		{
		echo '1';
		}	
	else echo $action;
	break;
	
case 'notice_hide':
	setcookie('yks-mailchimp-notice-hidden', '1', time()+60*60*24*30);
	echo '1';
	break;
	

		
		}
	}
?>