<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransfersFixture
 *
 */
class TransfersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'TransferId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'OldLocId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'OldItemId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'OldItemRecId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NewLocId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NewItemId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NewItemRecId' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'IsConfirmed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'TransferDate' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ConfirmDate' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'IsCancelled' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'TransferType' => ['type' => 'string', 'length' => 4, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'UserId' => ['type' => 'string', 'length' => 75, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'OldLocId' => ['type' => 'index', 'columns' => ['OldLocId'], 'length' => []],
            'OldItemId' => ['type' => 'index', 'columns' => ['OldItemId'], 'length' => []],
            'OldItemRecId' => ['type' => 'index', 'columns' => ['OldItemRecId'], 'length' => []],
            'NewLocId' => ['type' => 'index', 'columns' => ['NewLocId'], 'length' => []],
            'NewItemId' => ['type' => 'index', 'columns' => ['NewItemId'], 'length' => []],
            'NewItemRecId' => ['type' => 'index', 'columns' => ['NewItemRecId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['TransferId'], 'length' => []],
            'TransferId' => ['type' => 'unique', 'columns' => ['TransferId'], 'length' => []],
            'newLocation' => ['type' => 'foreign', 'columns' => ['NewLocId'], 'references' => ['locations', 'LocId'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'oldLocation' => ['type' => 'foreign', 'columns' => ['OldLocId'], 'references' => ['locations', 'LocId'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'TransferId' => 1,
            'OldLocId' => 1,
            'OldItemId' => 1,
            'OldItemRecId' => 1,
            'NewLocId' => 1,
            'NewItemId' => 2,
            'NewItemRecId' => 2,
            'IsConfirmed' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'TransferDate' => 1442753138,
            'ConfirmDate' => 1442753138,
            'IsCancelled' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'TransferType' => 'Lo',
            'UserId' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
