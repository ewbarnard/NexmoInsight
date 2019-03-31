<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormattingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormattingsTable Test Case
 */
class FormattingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FormattingsTable
     */
    public $Formattings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Formattings',
        'app.Contacts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Formattings') ? [] : ['className' => FormattingsTable::class];
        $this->Formattings = TableRegistry::getTableLocator()->get('Formattings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formattings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
