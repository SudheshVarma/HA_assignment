<?php

namespace Drupal\ha_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\file\Entity\File;
use Drupal\media\Entity\Media;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "attendees_table",
 *   admin_label = @Translation("Attendees Table"),
 *   category = @Translation("Attendees Table"),
 * )
 */
class attendees_table extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    // Building the table starting with the header.
    $header = array(
        array('data' => t('First Name')),
        array('data' => t('Last Name')),
        array('data' => t('Age')),
        array('data' => t('Gender'))
    );

    // Gathering node data to fetch the file URI.
    $node = \Drupal::routeMatch()->getParameter('node');
    // Getting the file data with the file target_id.
    $file = \Drupal\file\Entity\File::load($node->field_attendees[0]->target_id);
    $file_uri = $file->getFileUri();
    // Reading the data from file.
    $file = fopen($file_uri, "r");
    while (!feof($file)) {
        // Extracting the seperated data into array.
        $people = fgetcsv($file);
        // Building the rows.
        $row = array();
        foreach($people as $person) {
            $row[] = ['data' => $person];
        }
        $rows[] = $row;
    }
    // Closing the file after gathering the data.
    fclose($file);

    // Rendering the data into drupal table.
    $build['custom_table'] = array(
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $rows,
      );

    return $build;
  }

}