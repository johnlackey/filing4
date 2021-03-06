<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to TRUE, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to FALSE
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => TRUE,
        'CatId' => FALSE,
    ];
}
