<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formatting Entity
 *
 * @property int $id
 * @property int $contact_id
 * @property string $intl_format_number
 * @property string $natl_format_number
 * @property string $country_code
 * @property string $country_code_iso3
 * @property string $country_name
 * @property string $country_prefix
 *
 * @property \App\Model\Entity\Contact $contact
 */
class Formatting extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'contact_id' => true,
        'intl_format_number' => true,
        'natl_format_number' => true,
        'country_code' => true,
        'country_code_iso3' => true,
        'country_name' => true,
        'country_prefix' => true,
        'contact' => true
    ];
}
