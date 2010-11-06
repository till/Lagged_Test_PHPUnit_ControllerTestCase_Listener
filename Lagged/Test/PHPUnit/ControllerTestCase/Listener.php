<?php
/**
 * +-----------------------------------------------------------------------+
 * | Copyright (c) 2010, Till Klampaeckel                                  |
 * | All rights reserved.                                                  |
 * |                                                                       |
 * | Redistribution and use in source and binary forms, with or without    |
 * | modification, are permitted provided that the following conditions    |
 * | are met:                                                              |
 * |                                                                       |
 * | o Redistributions of source code must retain the above copyright      |
 * |   notice, this list of conditions and the following disclaimer.       |
 * | o Redistributions in binary form must reproduce the above copyright   |
 * |   notice, this list of conditions and the following disclaimer in the |
 * |   documentation and/or other materials provided with the distribution.|
 * | o The names of the authors may not be used to endorse or promote      |
 * |   products derived from this software without specific prior written  |
 * |   permission.                                                         |
 * |                                                                       |
 * | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
 * | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
 * | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
 * | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
 * | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
 * | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
 * | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
 * | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
 * | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
 * | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
 * | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
 * |                                                                       |
 * +-----------------------------------------------------------------------+
 * | Author: Till Klampaeckel <till@php.net>                               |
 * +-----------------------------------------------------------------------+
 *
 * PHP version 5
 *
 * @category Testing
 * @package  Lagged_Test_PHPUnit_ControllerTestCase_Listener
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version  GIT: $Id$
 * @link     http://github.com/till/Lagged_Test_PHPUnit_ControllerTestCase_Listener
 */

/**
 * @ignore
 */
require_once 'PHPUnit/Framework/TestListener.php';

/**
 * A listener!
 *
 * @category Testing
 * @package  Lagged_Test_PHPUnit_ControllerTestCase_Listener
 * @author   Till Klampaeckel <till@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @version  Release: @package_version@
 * @link     http://github.com/till/Lagged_Test_PHPUnit_ControllerTestCase_Listener
 */
class Lagged_Test_PHPUnit_ControllerTestCase_Listener implements PHPUnit_Framework_TestListener
{
    public function addError (
        PHPUnit_Framework_Test $test,
        Exception $e,
        $time
    ) {
        printf("Error while running test '%s'.\n", $test->getName());
    }

    public function addFailure (
        PHPUnit_Framework_Test $test,
        PHPUnit_Framework_AssertionFailedError $e,
        $time
    ) {
        if ($test instanceof PHPUnit_Framework_Warning) {
            /**
             * @desc Skip this: PHPUnit issued a warning: maybe no test cases or similar
             */
            return;
        }

        $response = $test->getResponse();

        printf("Test '%s' failed.\n", $test->getName());

        echo "RESPONSE\n\n";

        echo "Status Code: " . $response->getHttpResponseCode() . "\n\n";

        echo "Headers:\n\n";

        foreach ($response->getHeaders() as $header) {
            $replace = 'false';
            if ($header['replace'] === true) {
                $replace = 'true';
            }
            echo "\t {$header['name']} - {$header['value']} (replace: {$replace})\n";
        }

        echo "\n";

        echo "Body:\n\n" . $response->getBody() . "\n\n";

        if ($response->isException()) {

            echo "Exceptions:\n\n";

            foreach ($response->getException() as $exception) {

                echo "\t * Message: {$exception->getMessage()}\n";
                echo "\t * File:    {$exception->getFile()}\n";
                echo "\t * Line:    {$exception->getLine()}\n";

                echo "\n";
            }
        }
    }

    public function addIncompleteTest (
        PHPUnit_Framework_Test $test,
        Exception $e,
        $time
    ) {
        // do nada
    }

    public function addSkippedTest (
        PHPUnit_Framework_Test $test,
        Exception $e,
        $time
    ) {
        // do nada
    }

    public function startTest(PHPUnit_Framework_Test $test)
    {
        // do nada
    }

    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        // do nada
    }

    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        // do nada
    }

    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        // do nada
    }
}
