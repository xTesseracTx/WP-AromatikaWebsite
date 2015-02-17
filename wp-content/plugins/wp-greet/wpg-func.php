<?php
/* This file is part of the wp-greet plugin for wordpress */

/*  Copyright 2008-2013  Hans Matzen  (email : webmaster at tuxlog dot de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You 
are not allowed to call this page directly.'); }


//
// reads all wp-greet options from the database
//
function wpgreet_get_options() {

  // the following parameters are supported by wp-greet
  // wp-greet-version - the version of wp-greet used
  // wp-greet-minseclevel - the minimal security level needed to send a card
  // wp-greet-captcha - use captcha to prevent spaming? true, false
  // wp-greet-mailreturnpath - the email address uses as the default return path
  // wp-greet-staticsender - the email address will always be used as sender
  // wp-greet-autofillform - if set to true, the fields are filled from the profile of the logged in user
  // wp-greet-bcc - send bcc to this adress
  // wp-greet-imgattach - dont send a link, send inline image (true,false)
  // wp-greet-default-title - default title for mail
  // wp-greet-default-header - default header for email
  // wp-greet-default-footer - default footer for email
  // wp-greet-logging - enables logging of sent cards
  // wp-greet-imagewidth - sets fixed width for the image
  // wp-greet-gallery - the used gallery plugin
  // wp-greet-forüage - the pageid of the form page
  // wp-greet-galarr - the selected galleries for redirection to wp-greet
  //                   as array
  // wp-greet-smilies - switch to activate smiley support with greeting form
  // wp-greet-linesperpage - count of lines to show on each page of log
  // wp-greet-usesmtp - which method to use for mail transfer 1=smtp, 0=php mail
  // wp-greet-touswitch - activates terms of usage feature 1=yes, 0=no
  // wp-greet-termsofusage - contains the html text for the terms of usage
  // wp-greet-mailconfirm - activates the confirmation mail feature 1=yes, 0=no
  // wp-greet-mctext - text for the confirmation mail
  // wp-greet-mcduration - valid time of the confirmation link
  // wp-greet-onlinecard - dont get cards via email, fetch it online, yes=1, no=0
  // wp-greet-fields - a string of 0 and 1 describing the mandatory fields in the form
  // wp-greet-show-ngg-desc - if active displays the description from  ngg below the image

  $options = array("wp-greet-version" => "", 
		   "wp-greet-minseclevel" => "", 
		   "wp-greet-captcha" => "", 
		   "wp-greet-mailreturnpath" => "", 
  		   "wp-greet-staticsender" => "",
		   "wp-greet-autofillform" => "",
		   "wp-greet-bcc" => "",
		   "wp-greet-imgattach" => "",
		   "wp-greet-default-title" => "",
		   "wp-greet-default-header" => "",
		   "wp-greet-default-footer" => "",
		   "wp-greet-imagewidth" => "",
		   "wp-greet-logging" => "",
		   "wp-greet-gallery" => "",
		   "wp-greet-formpage" => "",
		   "wp-greet-galarr" => array(),
		   "wp-greet-smilies" => "",
		   "wp-greet-linesperpage" => "",
		   "wp-greet-usesmtp" => "",
		   "wp-greet-stampimage" => "",
		   "wp-greet-stamppercent" => "",
		   "wp-greet-mailconfirm" => "",
		   "wp-greet-mcduration" =>"",
		   "wp-greet-mctext" =>"",
		   "wp-greet-touswitch" =>"",
		   "wp-greet-termsofusage" =>"",
		   "wp-greet-onlinecard" => "",
		   "wp-greet-ocduration" => "",
		   "wp-greet-octext" => "",
		   "wp-greet-logdays" => "",
		   "wp-greet-carddays" => "",
		   "wp-greet-fields" => "",
  		   "wp-greet-show-ngg-desc" => "",
  		   "wp-greet-enable-confirm" => "",
  		   "wp-greet-future-send" => "",
           "wp-greet-multi-recipients" => "",
  		   "wp-greet-ectext" => "",
  		   "wp-greet-offerresend" => "",
  		   "wp-greet-tinymce" => "");


  reset($options);
  while (list($key, $val) = each($options)) {
    if ( $key != "wp-greet-galarr")
      $options[$key] = get_option($key);
    else {
      $options["wp-greet-galarr"] = unserialize( get_option("wp-greet-galarr"));
      if ( $options["wp-greet-galarr"] == False )
	$options["wp-greet-galarr"] = array();
    }
  }

  return $options;
}


//
// writes the current options to the wp-options table
//
function wpgreet_set_options() {
  global $wpg_options;
  reset($wpg_options);
  while (list($key, $val) = each($wpg_options)) {
    if (is_array($val) ) 
      update_option($key,serialize($val) );	 
    else
      update_option($key, $val);
  }
}


//
// function to check if an email adress is valid
// checks format and existance of mx record for mail host
//
function check_email($email) {
    //Leading and following whitespaces are ignored
    $email = trim($email);
    //Email-address is set to lower case
    $email = strtolower($email);
    // First, we check that there's one @ symbol, 
    // and that the lengths are right.
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
	// Email invalid because wrong number of characters 
	// in one section or wrong number of @ symbols.
	return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
	if  (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
	    return false;
	}
	
    }
    // Check if domain is IP. If not, 
    // it should be valid domain name
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
	$domain_array = explode(".", $email_array[1]);
	if (sizeof($domain_array) < 2) {
	    return false; // Not enough parts to domain
    }
	for ($i = 0; $i < sizeof($domain_array); $i++) {
	    if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
	    	return false;
	    }
	}
    }

    // check for domain existence
    if ( function_exists( 'checkdnsrr') ) {
	if (!checkdnsrr($email_array[1], "MX"))
	    return false;
    }

    // no error found it must be a valid domain
    return true;
}



//
// ermittelt anhand der file extension den zugehoerigen mimetype
//
function get_mimetype($fname)
{
  $ext = substr($fname,strrpos($fname,".")+1);
  
  switch ($ext) {
  case "jpeg":
  case "jpg":
  case "jpe":
  case "JPG":
    $mtype="image/jpeg";
    break;
  case "png":
    $mtype="image/png";
    break;
  case "gif":
    $mtype ="image/gif";
    break;
  case "tiff":
  case "tif":
    $mtype="image/tiff";
    break;
  default:
    $mtype="application/octet-stream";
    break;
  }
  return $mtype;
}

//
// erzeugt einen eintrag in der log tabelle mit den in den parametern angegeben werten
//
function log_greetcard($to, $from, $pic, $msg)
{
    global $wpdb;
 
    $now = gmdate("Y-m-d H:i:s",time() + ( get_option('gmt_offset') * 60 * 60 ));
    
    $sql = "insert into ". $wpdb->prefix . "wpgreet_stats values (0,'" . $now . "', '" . $from . "','" . $to . "','" . $pic . "','" . esc_sql($msg). "','". $_SERVER["REMOTE_ADDR"] . "');" ;

    $wpdb->query($sql); 
}


//
// fuegt die capability wp-greet-send zu allen rollen >= $role hinzu
//
function set_permissions($role) {
  global $wp_roles;

  $all_roles = $wp_roles->role_names;

  // das recht fuer alle rollen entfernen
  foreach($all_roles as $key => $value) {
    $drole= get_role($key);
    if ( ($drole !== NULL) and $drole->has_cap("wp-greet-send") ) {
      $drole->remove_cap('wp-greet-send');
    }
  }
  
  
  foreach ($all_roles as $key => $value) {
    $crole = get_role($key);
    if ($crole !== NULL) {
      $crole->add_cap('wp-greet-send'); 
    }
    
    if ($key == $role)
      break;  
  }
}

//
// verbindet wp-greet mit ngg, es wird die url angepasst
//
function ngg_connect($link='' , $picture='') {
	// fix ngg 2.0x new var names
	if (isset($picture->galleryid)) {
		$picture->gid = $picture->galleryid;
	}
	
  $wpdb =& $GLOBALS['wpdb'];
  // wp-greet optionen aus datenbank lesen
  $wpg_options = wpgreet_get_options();
  
  // pruefe ob gallery umgelenkt werden soll
  if (array_search($picture->gid, $wpg_options['wp-greet-galarr']) !== False) {
     
  	if (isset($picture->path)) {  //old ngg until 1.9.13
      	$folder_url  = get_option ('siteurl')."/".$picture->path."/";
  	} else {
  		$folder_url  = get_option ('siteurl')."/";
  	}
  	
      $url_prefix = get_permalink($wpg_options['wp-greet-formpage']);
      if (strpos($url_prefix,"?") === false )
	  	$url_prefix .= "?";
      else
	  	$url_prefix .= "\&amp;";

      // fix ngg 2.0x new var names
      if (isset($picture->path)) {  //old ngg until 1.9.13
      	$link = $url_prefix . "gallery=" . $picture->gid ."\&amp;image=" . $folder_url . $picture->filename;
      } else { // new ngg from 2.0.0 on
      	$link = $url_prefix . "gallery=" . $picture->gid ."\&amp;image=" . $link;
      }
  
      
      if (defined('BWCARDS')) {
      	$link .= "\&amp;pid=".$picture->pid;
      }
  }
  
  return stripslashes($link);
}

//
// entfernt den ngg thumbcode
//
function ngg_remove_thumbcode($thumbcode,$picture) {
  
  // wp-greet optionen aus datenbank lesen
  $wpg_options = wpgreet_get_options();
  
  // pruefe ob gallery umgelenkt werden soll
  if (array_search($picture->gid, $wpg_options['wp-greet-galarr']) !== False) 
    $thumbcode = "";
  return $thumbcode;
}

//
// umkehrfunktion zu nl2br :-)
//
//function br2nl($text)
//{
//  return str_replace("<br />","",$text);
//}


function get_dir_alphasort($pfad)
{
  // Prüfung, ob das angegebene Verzeichnis geöffnet werden kann
  if( ($pointer = opendir($pfad)) == false ) {
    // Im Fehlfall ist das bereits der Ausgang
    return false;
  }

  $arr = array();
  while( $datei = readdir($pointer) ) {
    // Prüfung, ob es sich überhaupt um Dateien handelt
    // oder um Synonyme für das aktuelle (.) bzw.
    // das übergeordnete Verzeichnis (..)
    if( is_dir($pfad."/".$datei) || $datei == '.' || $datei == '..' ) 
      continue;
    
    $arr[] = $datei;
  }
  closedir($pointer);
  array_multisort($arr);

  return $arr;
}

function wpg_debug($text)
{
if (is_array($text) || is_object($text)) {
            error_log(print_r($text, true));
    } else {
            error_log($text);
        }
}

function test_gd()
{
    $res="";
    $res .= "GD support on your server: ";
    
    // Check if the function gd_info exists (way to know if gd is istalled)
    if(function_exists("gd_info"))
    {
	$res .= "YES\n";
	$gd = gd_info();
	
        // Show status of all values that might be supported(unsupported)
	foreach($gd as $key => $value)
	{
	    $res .= $key . ": ";
	    if($value)
		$re .= "YES\n";
	    else
		$res .= "NO\n";
	}
    }
    else
	$res .= "NO";
    
    return $res;
}

//
// speichert eine karte  in der datenbank
//
function save_greetcard($sender, $sendername, $recv, $recvname, 
			$title, $message, $picurl, $cc2sender, 
			$confirmuntil, $confirmcode,$fetchuntil,$fetchcode,$sendtime,$sessionid="")
{
    global $wpdb;
   
    //$wpdb->show_errors(true);
    // convert to mysql date
	$sendtime = date('Y-m-d H:i:s', $sendtime);
    if ($fetchcode == "" or $confirmcode == "") {
	$sql = "insert into ". $wpdb->prefix . "wpgreet_cards values (0, '$sendername', '$sender', '$recvname', '$recv', '$cc2sender', '". esc_sql($title)."', '$picurl','". esc_sql($message)."', '$confirmuntil', '$confirmcode', '$fetchuntil', '$fetchcode','','','$sendtime','$sessionid');";
	
	$wpdb->query($sql); 
    } else {
	$sql = "select count(*) as anz from " .  $wpdb->prefix . "wpgreet_cards where confirmcode='$confirmcode';";

	$count = $wpdb->get_row($sql);
	if ( $count->anz == 0)
	    $sql = "insert into ". $wpdb->prefix . "wpgreet_cards values (0, '$sendername', '$sender', '$recvname', '$recv', '$cc2sender', '".esc_sql($title)."', '$picurl','". esc_sql($message)."', '$confirmuntil', '$confirmcode','$fetchuntil', '$fetchcode','','','$sendtime','$sessionid');";
	else
	    $sql = "update ". $wpdb->prefix . "wpgreet_cards set fetchuntil='$fetchuntil', fetchcode='$fetchcode' where confirmcode='$confirmcode';";
	
	 $wpdb->query($sql);
    }
}


//
// markiert die karte mit dem confirmcode ccode als versendet
//
function mark_sentcard($ccode)
{
    global $wpdb; 
    $now = gmdate("Y-m-d H:i:s",time() + ( get_option('gmt_offset') * 60 * 60 ));
    $sql = "update ". $wpdb->prefix . "wpgreet_cards set card_sent='$now' where confirmcode='".$ccode."';";
    $wpdb->query($sql); 
}

//
// markiert die karte mit der sessionid $sid als versendet
//
function bwmark_sentcard($sid)
{
    global $wpdb; 
    $now = gmdate("Y-m-d H:i:s",time() + ( get_option('gmt_offset') * 60 * 60 ));
    $sql = "update ". $wpdb->prefix . "wpgreet_cards set card_sent='$now' where session_id='".$sid."';";
    $wpdb->query($sql); 
}

//
// markiert die karte mit dem fetchcode fcode als mindestens einmal abgeholt
//
function mark_fetchcard($fcode)
{
    global $wpdb;
    $now =  gmdate("Y-m-d H:i:s",time() + ( get_option('gmt_offset') * 60 * 60 ));
    $sql = "update ". $wpdb->prefix . "wpgreet_cards set card_fetched='$now' where fetchcode='".$fcode."';";
    $wpdb->query($sql); 
}

//
// loescht alle karteneintraege die länger als das höchste mögliche abholdatum
// plus die die angegebene zahl an tagen sind
//
function remove_cards()
{ 
    // wp-greet optionen aus datenbank lesen
    $wpg_options = wpgreet_get_options();

    // nichts löschen wenn der parameter auf 0 oder leer steht
    if ( $wpg_options['wp-greet-carddays'] == 0 or $wpg_options['wp-greet-carddays'] == "")
	return;

    // berechne höchstes gültiges  fetch datum
    $then = time() + ( get_option('gmt_offset') * 60 * 60 ) - 
	( $wpg_options['wp-greet-carddays'] * 60 * 60 * 24 );
    $then =  gmdate("Y-m-d H:i:s",$then);
    
    
    global $wpdb;
    $sql = "delete from ". $wpdb->prefix . "wpgreet_cards where fetchuntil < '$then';";
    $c = $wpdb->query($sql); 

    if ($c > 0) {
    	log_greetcard('',get_option("blogname"),'',"Cards cleaned until $then");
    } 
}


//
// loescht alle logeinträge die länger als die vorgegebene anzahl von tagen
// in der tabelle stehen
//
function remove_logs()
{
    // wp-greet optionen aus datenbank lesen
    $wpg_options = wpgreet_get_options();

    // nichts löschen wenn der parameter auf 0 oder leer steht
    if ( $wpg_options['wp-greet-logdays'] == 0 or $wpg_options['wp-greet-logdays'] == "")
	return;

    // berechne höchstes gültiges  fetch datum
    $then = time() + ( get_option('gmt_offset') * 60 * 60 ) - 
	( $wpg_options['wp-greet-logdays'] * 60 * 60 * 24 );
    $then = gmdate("Y-m-d H:i:s",$then);
    
    
    global $wpdb;
    $sql = "delete from ". $wpdb->prefix . "wpgreet_stats where senttime < '$then';";
    $c = $wpdb->query($sql);

    if ($c > 0) {
    	log_greetcard('',get_option("blogname"),'',"Log cleaned until $then");
    }
}

//
// wandelt ein mysql timestamp in einer zahl um, die die sekunden seit 1970
// wiedergibt. funktioniert für mysql4 und mysql5
//
function msql2time($m)
{
    // mysql5 2009-11-05 12:45:01
    if ( strpos( $m, ":" ) > 0 )
	return strtotime( $m );
    else {
	// mysql 4 - 20091105124501
	preg_match('/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', $m, $p);
	return mktime($p[4], $p[5], $p[6], $p[2], $p[3], $p[1]); 
    }
}

//
// erzeugt die url für das bild mit briefmarke
// $pic - url des bildes fuer die grusskarte
//
function build_stamp_url($pic)
{
    // wp-greet optionen aus datenbank lesen
    $wpg_options = wpgreet_get_options();
    
    $surl=get_option('siteurl');
    $picpath = ABSPATH . substr($pic, strpos($pic, $surl) + strlen($surl)+1);
    $stampimg = ABSPATH . $wpg_options['wp-greet-stampimage'];
    if (file_exists($stampimg))
		$alttext = basename($pic);
    else
		$alttext = __("Stampimage not found - Please contact your administrator","wp-greet");
    
    $link = site_url("wp-content/plugins/wp-greet/"). "wpg-stamped.php?cci=$picpath&amp;sti=".
		$stampimg . "&amp;stw=" . $wpg_options['wp-greet-stamppercent'];
    
    return $link;
}

//
// generiert das img tag fgemäß der eingestellten parameter
// wird verwendet für formular, voransicht und abruf
// berücksichtigt briefmarken, ngg daten einstellungen
//
function get_imgtag($url) {
	// od nothing without url
	if ($url=="")
		return "";
		
	// hole optionen
  	$wpg_options = wpgreet_get_options();
	$filename = basename($url);
	$imgtag = "<div>";
  	
  	// kommt eine briefmarke auf das bild?
  	$stampit = ( trim($wpg_options['wp-greet-stampimage']) != "" and 
		       ( trim($wpg_options["wp-greet-imgattach"] ) != "" or
			     trim($wpg_options["wp-greet-onlinecard"]) != "" ));
			     
	if ($stampit)
	    $url =  build_stamp_url($url);
			     
	// breite ermitteln
	$width = "100%";
	if ($wpg_options['wp-greet-imagewidth']!="")
		$width = $wpg_options['wp-greet-imagewidth'];
		
  	// nextgen gallery daten lesen			     
  	global $nggdb;
  	
  	$ngg_desc="";
  	$ngg_alttext="";
  	if ( $wpg_options['wp-greet-show-ngg-desc'] and $nggdb) {
		$nggimg = $nggdb->search_for_images(substr($url,strrpos($url,"/")+1));
		$ngg_desc = trim($nggimg[0]->description);
		$ngg_alttext = trim($nggimg[0]->alttext);
	}
	
	
	$imgtag .= '<div class="wpg_image"><img src="' . $url . '" alt="';
   	$imgtag .= (strlen($ngg_alttext) > 0)?$ngg_alttext:$filename;
   	$imgtag .= '" title="';
   	$imgtag .= (strlen($ngg_alttext) > 0)?$ngg_alttext:$filename;
   	$imgtag .= '" width="' . $width ."\"/></div>\n";

   	if ($wpg_options['wp-greet-show-ngg-desc'] and strlen($ngg_desc) > 0)
    		$imgtag .= "<div classe='wpg_image_description'>" . $ngg_desc . "</div>";
    
    $imgtag .= "</div>";
    		
   	return $imgtag;	
}

//
// If we run with a broken NGG Version >= 2.0.0 print a hint with the solution
// to give a chance ti fix it.
//
function wpg_fix_broken_ngg_hint() {
	$message="";
	$broken_since="2.0.0";
	
	// if we do not use ngg, just return
	global $wpg_options;
	$wpg_options=wpgreet_get_options();
	if ( $wpg_options['wp-greet-gallery']=="wp") return;
	
	$plugin_folder = plugin_dir_path(__FILE__) . "/../";
	$plugdata = get_plugin_data($plugin_folder . "nextgen-gallery/nggallery.php",false,false);
	$ngg_version = $plugdata['Version'];
	
	if (is_plugin_active("nextgen-gallery/nggallery.php") and version_compare($ngg_version, $broken_since, ">=")) {
		// test if allready patched
		$ps = file_get_contents($plugin_folder . "nextgen-gallery/products/photocrati_nextgen/modules/nextgen_basic_gallery/templates/thumbnails/index.php" );
		
		if (false === strpos($ps, "ngg_create_gallery_link")) {
			
			$message= <<<EOL
			<h3>Urgent message from wp-greet</h3>
			<p>Unfortunately Photocrati did a major redesign of NGG and therfore the connecting filters for wp-greet were removed. 
			You can get a lot of details in the <a target="_blank" href="http://wordpress.org/support/plugin/nextgen-gallery">wordpress.org forums</a>.<br/> 
			To workaround this and make wp-greet work again please edit
			nextgen-gallery/products/photocrati_nextgen/modules/nextgen_basic_gallery/templates/thumbnails/index.php 
			<br />and change the line with</p>
		
			&lt;a href="&lt;?php echo esc_attr(\$storage->get_image_url(\$image))?>"
		
			to
		
			&lt;a href="&lt;?php echo apply_filters('ngg_create_gallery_link', esc_attr(\$storage->get_image_url(\$image)), \$image)?>"
		
			<p>You can also fetch the patched file (2xx_index.php) from the wp-greet/patch directory and copy it
			to nextgen-gallery/products/photocrati_nextgen/modules/nextgen_basic_gallery/templates/thumbnails/index.php.<br/> 
			E.g. take 211_index.php for NGG version 2.11</p>
			<p>Since NGG does not work with all Lightbox-Effects. Please set Gallery -> Other Options -> Lightbox Options to Shutter,
			if you encounter problems with other settings.</p>
EOL;
		}
	}
	
	// print message
	if ($message !="") {
		echo '<div id="message" class="error">';
		echo "<p><strong>$message</strong></p></div>";
	}
}

// functions to connect to WP native gallery
//
// create gallery with the different url filter active
//
function wpgreet_gallery_shortcode( $attr )
{
	global $post;
	$pid = $post->ID;

	// wp-greet optionen aus datenbank lesen
	$wpg_options = wpgreet_get_options();
	
	// check if we shall connect wp-greet
	// load connected gallery pages
	$connectus = in_array((string) $pid,$wpg_options['wp-greet-galarr']);
		
	// add the filter for attachment links:
	if ($connectus) {
		add_filter( 'wp_get_attachment_link', 'wpgreet_gallery_link_filter', 10, 6 );

		// remove jetpack filters
		global $wp_filter;
		if ( isset($wp_filter['post_gallery'][1000]) )
			$wp_filter['post_gallery'][1000] = array();
	 }
	 
	// get WordPress native gallery
	$gallery = gallery_shortcode( $attr );
	 
	// Remove the filter for attachment links:
	if ($connectus)
		remove_filter( 'wp_get_attachment_link', 'wpgreet_gallery_link_filter', 10 );
	 
	return $gallery;
}

//
// change link to wpgreet link
//
function wpgreet_gallery_link_filter( $full_link, $id, $size, $permalink, $icon, $text )
{
	// change the value of href to suite wp-greet form link
	
	// get post id
	global $post;
	$gid = $post->ID;

	// extract image anchor url
	$xml = simplexml_load_string($full_link);
	// get anchor link because this is what we want to replace later on
	$alist = $xml->xpath("//@href");
	$aitem=parse_url($alist[0]);
	$aurl = $aitem['scheme'] . '://' .  $aitem['host'] . $aitem['path'];
	
	// getting the img url this is what we want to give as a parm to wp-greet
	$url = wp_get_attachment_image_src( $id, 'full' );
	$url = $url[0];
	// get wp-greet optionen from database
	$wpg_options = wpgreet_get_options();
	
	// build wp-greet form-page link and add parms
	$url_prefix = get_permalink($wpg_options['wp-greet-formpage']);
	if (strpos($url_prefix,"?") === false )
		$url_prefix .= "?";
	else
		$url_prefix .= "&amp;";
	
	$link = $url_prefix . "gallery=" . $gid ."\&amp;image=" . $url;

	// replace anchor link to redirect to wp-greet
	$erg = stripslashes(str_replace($aurl,$link,$full_link));

	return $erg;
}
?>
