<?php

namespace Drupal\views_show_more_less\Plugin\views\pager;

use Drupal\views\Plugin\views\pager\SqlBase;
use Drupal\Core\Form\FormStateInterface;

/**
* The plugin to handle paged output.
*
* @ingroup views_pager_plugins
*
* @ViewsPager(
*   id = "view_show_more_less_pager",
*   title = @Translation("View Show More Less Pager"),
*   help = @Translation("View Show More Less Pager"),
*   short_help = @Translation("View Show More Less Pager"),
*   theme = "views_view_pager",
*   register_theme = TRUE,
* )
*/
class ViewShowMoreLessPager extends SqlBase {
  /**
   * Implements \Drupal\views\Plugin\views\pager\PagerPluginWithFormsInterface::defineOptions().
   */
  public function defineOptions() {
    $options = parent::defineOptions();
    $options['display_more_less_link_option'] = array('default' => '');
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function summaryTitle() {

    return 'Settings';
  }

  /**
   * Implements \Drupal\views\Plugin\views\pager\PagerPluginWithFormsInterface::buildOptionsForm().
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $exclude = ['total_pages', 'expose', 'tags'];
    foreach ($exclude as $ex) {
      unset($form[$ex]['#title']);
      unset($form[$ex]['#description']);
      $form[$ex]['#attributes'] = ['class' => ['visually-hidden']];
    }

    $form['display_more_less_link_option'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display button'),
      '#default_value' => $this->options['display_more_less_link_option'],
    );
  }


}
