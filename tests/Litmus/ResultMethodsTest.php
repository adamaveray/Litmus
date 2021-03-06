<?php
/**
 *
 * @package Litmus_UnitTest
 * @author Guillaume <guillaume@geelweb.org>
 * @copyright Copyright (c) 2010, Guillaume Luchet
 * @license http://opensource.org/licenses/bsd-license.php BSD License
 */

/**
 *
 * @package Litmus_UnitTest
 */
class ResultMethodsTest extends PHPUnit_Framework_TestCase
{
    public function testResultsMethod()
    {
        $test = Litmus::getTests(1); 
        $version = $test->getVersions(1);
        $results = $version->getResults();
        $this->assertTrue(is_array($results));
        $this->assertTrue($results[0] instanceof Litmus_Result);
    }

    public function testResultsShowMethod()
    {
        $test = Litmus::getTests(1); 
        $version = $test->getVersions(1);
        $result = $version->getResults(1);
        $this->assertTrue($result instanceof Litmus_Result);
        $this->assertTrue($result instanceof Litmus_Result);
        $this->assertEquals($result->check_state, null);
        $this->assertEquals($result->error_at, null);
        $this->assertEquals($result->finished_at, null);
        $this->assertEquals($result->id, 1);
        $this->assertEquals($result->started_at, null);
        $this->assertEquals($result->test_code, 'saf2');
        $this->assertEquals($result->state, 'pending');
        $this->assertEquals($result->result_type, 'page');
    }

    public function testResultsUpdateMethod()
    {
        $test = Litmus::getTests(1); 
        $version = $test->getVersions(1);
        $result = $version->getResults(1);
        $updated_result = $result->update(array('check_state' => 'ticked'));
        $this->assertTrue($updated_result instanceof Litmus_Result);
        $this->assertEquals($updated_result->id, 1);
    }

    public function testResultsRetestMethod()
    {
        $test = Litmus::getTests(1); 
        $version = $test->getVersions(1);
        $result = $version->getResults(1);
        $res = $result->retest();
        $this->assertTrue($res);
    }
}
 
