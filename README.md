# FailureTest

A way to include failing tests in your PHP project

```php
    use FailureTestCase;

    public function test_it_handles_a_failure()
    {
        $this->assertTrue(false);
    }
```

Any failed test will be marked as incomplete. A test that completely passes is marked as failed. Which means you can move it to the successful tests.