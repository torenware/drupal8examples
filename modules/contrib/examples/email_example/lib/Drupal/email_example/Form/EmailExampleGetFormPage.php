<?php
/**
 * @file
 * Contains \Drupal\email_example\Form\EmailExampleGetFormPage.
 */

namespace Drupal\email_example\Form;

use Drupal\Core\Form\FormInterface;

/**
 * File test form class.
 */
class EmailExampleGetFormPage implements FormInterface {

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'email_example';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $form['intro'] = array(
      '#markup' => t('Use this form to send a message to an e-mail address. No spamming!'),
    );
    $form['email'] = array(
      '#type' => 'textfield',
      '#title' => t('E-mail address'),
      '#required' => TRUE,
    );
    $form['message'] = array(
      '#type' => 'textarea',
      '#title' => t('Message'),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, array &$form_state) {
    if (!valid_email_address($form_state['values']['email'])) {
      form_set_error('email', t('That e-mail address is not valid.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    email_example_mail_send($form_state['values']);
  }
}
