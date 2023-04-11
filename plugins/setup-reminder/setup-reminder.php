<?php global $wp_query;
/*
Plugin Name: Send Setup Reminder to HCP

Plugin URI:  http://link to your plugin homepage

Description: Sends an email back to HCP if their patient purchases device after recieving a buy now link from HCP.

Version:     1.0

Author:     Chris Brown

Author URI:  http://www.immedia-creative.com

1)this should run when a new order is completed. (add_action = woocommerce_payment_complete) YES
2)trigger to send email to hcp = that woocommerce order just completed includes the hcpid of the doctor)
3) we then need to get the purchaser's details to send to our hcp.
4) build the email
5) send the email
*/

function send_reminder_hcp() {
	
	// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
//get the order id ++++++++++++++

//Declare the global WooCoomerce Object & Post Object
global $woocommerce, $post;
//Assign the order ID using the $post->ID 
$order = new WC_Order($post->ID);
// Use the getter function to get order ID  
$myorderid = $order->get_id();

$order_data = $order->get_data(); // The Order data

$order_id = $order_data['id'];
$order_parent_id = $order_data['parent_id'];

// see https://www.codegrepper.com/code-examples/whatever/how+to+get+woocommerce+order+details+in+php
$order_status = $order_data['status']; 
$order_billing_first_name = $order_data['billing']['first_name'];
$order_billing_last_name = $order_data['billing']['last_name'];
$order_billing_company = $order_data['billing']['company'];
$order_billing_address_1 = $order_data['billing']['address_1'];
$order_billing_address_2 = $order_data['billing']['address_2'];
$order_billing_city = $order_data['billing']['city'];
$order_billing_state = $order_data['billing']['state'];
$order_billing_postcode = $order_data['billing']['postcode'];
$order_billing_country = $order_data['billing']['country'];
$order_billing_email = $order_data['billing']['email'];
$order_billing_phone = $order_data['billing']['phone'];




// get the HCPs id and then get their email address ++++++++++++++++++++++++++++
$order_hcpid = get_post_meta($order->get_id(), 'hcpid', true );
//and then get their email address ++++++++++++++++++++++++++++
$hcpuser_info = get_userdata($order_hcpid);
      $hcpusername = $hcpuser_info->user_login;
	  $hcpuseremail = $hcpuser_info->user_email;

  
// setup the outbound email parameters +++++++++++++++++++++++++++++
	$to = "chris.brown@immedia-creative.com";
	$subject = "Setup Reminder";
	$message = "Remember to setup portal for this person. - ";
	$message.= "\r\n";
	$message.= "\r\n";
	$message.= $order_billing_first_name;
	$message.= " ";
	$message.= $order_billing_last_name;
	$message.= "\r\n";
    $message.= $order_billing_email;
	$message.= "\r\n";
	$message.= "\r\n";
	$message.= $order_hcpid; //show for testing
	$message.= "\r\n";
	$message.= $hcpusername; //show for testing
	$message.= "\r\n";
	$message.= $hcpuseremail; //show for testing	
	
//send email
	$remindersent = wp_mail( $to, $subject, $message );
	
	}




add_action( 'woocommerce_order_status_completed', 'send_reminder_hcp', 10, 1);