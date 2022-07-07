<?php
return array(
   'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
    ),
    'operator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Message operator',
    ),
    'moderator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Message admin',
    ),

    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'super Administrator',
    ),

);