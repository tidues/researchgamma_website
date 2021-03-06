<?php

/* -----------------
 * The success message displayed when the form is successfully submitted
 ------------------- */
$successMessage = '<div class="karma_notify message_green"><p>Thank you for messaging us. This success message is easily customizable. Cheers!</p></div>';
$form->setSuccessMessage($successMessage);





/* -----------------
 * Email Recipients
 ------------------- */
/**
 * You can add multiple email
 * addresses by adding one on each line inside the array enclosed in quotes,
 * separated by commas. E.g.
 * $recipients = array(
 *     'recipient1@example.com',
 *     'recipient2@example.com'
 * );
 */
$recipients = array(
    'info@truethemes.net'
);





/* -----------------
 * Form Handler 
 ------------------- */
/**
 * Create the email success handler, this will email the
 * contents of the form to the set recipients when the form
 * is successfully submitted.
 */
$emailSuccessHandler = new iPhorm_SuccessHandler_Email($form);
$emailSuccessHandler->setRecipients($recipients);
$emailSuccessHandler->setSubject('Contact enquiry from %name%');






/* -----------------
 * Form Fields
  ------------------- */
 
 
 /**
 * When adding new fields first add HTML to your form then simply
 * copy/paste PHP below and modify to match your new field
 */



/* NAME */
$name = new iPhorm_Element('name');   // Create the name element - name must be the same as the name attribute of your form element in the HTML
$name->addFilter('trim');             // Add the Trim filter to the element
$name->addValidator('required');      // Add the Required validator to the element (makes the field required)
$form->addElement($name);             // Add the element to the form



/* EMAIL */
$email = new iPhorm_Element('email'); 
$email->addFilter('trim');
$email->addValidators(array('required', 'email'));
$form->addElement($email);



/* PHONE */
$phone = new iPhorm_Element('phone');
$phone->addFilter('trim');
$form->addElement($phone);



/* MESSAGE (TEXTAREA) */
$message = new iPhorm_Element('message');
$message->addFilter('trim');
$message->addValidator('required');
$form->addElement($message);









/* -----------------
 * CAPTCHA 
  ------------------- */
  
$captcha = new iPhorm_Element('type_the_word');                 // Create the type_the_word (captcha) element - type_the_word must be the same as the name attribute of your form element in the HTML
$captcha->addFilter('trim');                                    // Add the Trim filter to the element
$captcha->addValidator('required');                             // Add the Required validator to the element
$captcha->addValidator('identical', array('token' => 'light')); // Add Identical validator value must match the word light
$captcha->setSkipRender(true);                                  // Success handlers should not render the element
$form->addElement($captcha);                                    // Add the element to the form
