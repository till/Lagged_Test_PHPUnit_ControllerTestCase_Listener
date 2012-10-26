## Just listen

### Install

    pear channel-discover easybib.github.com/pear
    pear install easybib/Lagged_Test_PHPUnit_ControllerTestCase_Listener-alpha

Btw - [there's more](http://easybib.github.com/pear).

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
