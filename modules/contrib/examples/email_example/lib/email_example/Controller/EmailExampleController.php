<?php
/**
 * @file
 * Contains \Drupal\email_example\Controller\EmailExampleGetFormPage.
 */

namespace Drupal\email_example\Controller;

use Drupal\Core\Form\FormInterface;

class EmailExampleGetFormPage implements FormInterface {

  /**
   * Implements \Drupal\Core\Form\FormInterface::getFormID().
   */
  public function getFormID() {
    return 'email_example_form';
  }
  
  /**
   * Implements \Drupal\Core\Form\FormInterface::buildForm().
   */
  public function buildForm(array $form, array &$form_state) {
    $form['foo'] = array(
      '#type' => 'select',
      '#title' => t('Foo'),
      '#default_value' => 'bar',
      '#options' => array(
        'foo' => t('Foo'),
        'bar' => t('Bar'),
      ),
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#name' => 'op',
      '#type' => 'submit',
      '#value' => t('Save'),
      '#button_type' => 'primary',
    );
    $form['actions']['cancel'] = array(
      '#name' => 'op',
      '#type' => 'submit',
      '#value' => t('Cancel'),
    );
    return $form;
  }

  /**
   * Implements \Drupal\Core\Form\FormInterface::validateForm().
   */
  public function validateForm(array &$form, array &$form_state) {
  }

  /**
   * Implements \Drupal\Core\Form\FormInterface::submitForm().
   */
  public function submitForm(array &$form, array &$form_state) {
  }

}
