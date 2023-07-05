[⇒日本語のREADMEへ](README.md)

# gs2-php-sdk

SDK for using Game Server Services (https://gs2.io) in PHP.

## What is Game Server Services?

Game Server Services(GS2) is a back-end server service (BaaS) specialized for game development.

GS2 is a general-purpose game server solution created to improve efficiency for game developers and supports Games as a Service (GaaS) and Live Gaming.

The service allows for flexible management of player data and data analysis, enabling proper analysis of in-game resource distribution and consumption to maintain a healthy environment.
In addition, it provides story progression management and possession management, contributing to game monetization and player engagement.
GS2 supports online functionality and makes it easy for game developers to analyze data and manage economics to help their games succeed.

## Getting Started

GS2 credentials are required to use the SDK.
Follow the instructions in [GS2 Setup](https://docs.gs2.io/en/get_start/tutorial/setup_gs2/) to issue the credential.

### Requirements

- PHP7.1+

[⇒Start using GS2 - SDK - Various programming languages](https://docs.gs2.io/en/get_start/#various-programming-languages)

### Sample

GS2-Account Implementation Example

#### Initialization process

```php
use Gs2\Account\Gs2AccountRestClient;
use Gs2\Core\Model\BasicGs2Credential;
use Gs2\Core\Model\Region;
use Gs2\Core\Net\Gs2RestSession;

$session = new Gs2RestSession(
    new BasicGs2Credential(
        "your client id",
        "your client secret"
    ),
    Region::AP_NORTHEAST_1
);

$session->open();

$client = new Gs2AccountRestClient(
    $session
);
```

#### Synchronization processing

```php
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Request\CreateNamespaceRequest;
use Gs2\Core\Exception\Gs2Exception;
use PHPUnit\Framework\Assert;

try {
    $result = $client->createNamespace(
        (new CreateNamespaceRequest())
            ->withName('namespace-0001')
            ->withAuthenticationScript(
                (new ScriptSetting())
                    ->withTriggerScriptId('script-0001')
            )
    );
    
    Assert::assertNotNull($result->getItem());
    Assert::assertEquals('namespace-0001', $result->getItem()->getName());
    Assert::assertEquals('script-0001', $result->getItem()->getAuthenticationScript()->getTriggerScriptId());
} catch (Gs2Exception $e) {
    Assert::fail($e->getMessage());
}
```

#### Asynchronous processing

```php
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Request\CreateNamespaceRequest;
use Gs2\Account\Result\CreateNamespaceResult;
use Gs2\Core\Exception\Gs2Exception;
use PHPUnit\Framework\Assert;

// Promise returned for handling asynchronous processing
$promise = $client->createNamespaceAsync(
    (new CreateNamespaceRequest())
        ->withName('namespace-0001')
        ->withAuthenticationScript(
            (new ScriptSetting())
                ->withTriggerScriptId('script-0001')
        )
)->then(
    function (CreateNamespaceResult $result) {
        // If you want to handle this in a callback format, write the handler on success here
        Assert::assertNotNull($result->getItem());
        Assert::assertEquals('namespace-0001', $result->getItem()->getName());
        Assert::assertEquals('script-0001', $result->getItem()->getAuthenticationScript()->getTriggerScriptId());
    },
    function (Gs2Exception $e) {
        // If you want callback-style handling, put a failure handler here
        Assert::fail($e->getMessage());
    }
);

try {
    // Waiting for a Promise executes the process. The return value is the result on success, and an exception is raised on failure.
    $result = $promise->wait();
    Assert::assertNotNull($result->getItem());
    Assert::assertEquals('namespace-0001', $result->getItem()->getName());
    Assert::assertEquals('script-0001', $result->getItem()->getAuthenticationScript()->getTriggerScriptId());
} catch (Gs2Exception $e) {
    Assert::fail($e->getMessage());
}
```

For documentation on Promise, please see https://github.com/guzzle/promises here.

## SDK detailed specifications

For details on the API for each service and communication method, please refer to the

 [⇒API Reference](https://docs.gs2.io/en/api_reference/) page.

For information on the initialization process, please refer to the

 [⇒API Reference - Initialization process](https://docs.gs2.io/en/api_reference/initialize/) page.

## GS2-SDK for UE5 Blueprint Tutorial

https://docs.gs2.io/en/get_start/blueprint/

*All code in this project is automatically generated except for gs2-php-sdk-core, so we cannot respond to individual pull-requests. *
