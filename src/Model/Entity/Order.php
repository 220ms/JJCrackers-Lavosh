<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $price
 * @property \Cake\I18n\FrozenTime $created
 * @property string $status
 * @property int $user_id
 * @property string $cust_name
 * @property string $email
 * @property string $shipping_address
 * 
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $products
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'price' => true,
        'created' => true,
        'status' => true,
        'user_id' => true,
        'user' => true,
        'products' => true,
        'cust_name' => true,
        'email' => true,
        'shipping_address' => true,
    ];
}
