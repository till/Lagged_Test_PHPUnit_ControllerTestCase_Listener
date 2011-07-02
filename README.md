## Just listen

### Install

    pear channel-discover till.pearfarm.org
    pear install till.pearfarm.org/Lagged_Test_PHPUnit_ControllerTestCase_Listener-alpha

### Usage

In your `phpunit.xml`:

    <phpunit colors="true" syntaxCheck="true">
        <testsuite name="Your TestSuite">
            <file>AllTests.php</file>
        </testsuite>
        <listeners>
            <listener class="Lagged_Test_PHPUnit_ControllerTestCase_Listener" file="Lagged/Test/PHPUnit/ControllerTestCase/Listener.php" />
        </listeners>
    </phpunit>

### Further reading

http://till.klampaeckel.de/blog/archives/116-Debugging-Zend_Test.html
