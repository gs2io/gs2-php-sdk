# gs2-php-sdk

Game Server Services(https://gs2.io) を PHP で利用するためのSDKです。

## Game Server Services とは

> Game Server Services(GS2) とはモバイルゲーム開発に特化したバックエンドサーバサービス(BaaS)です。
>
>   ゲーム開発に必要なネットワーク機能をコンポーネント化してサービスとして提供します。 ゲーム内から必要な一部のコンポーネント単位で利用することができるよう設計されており、手軽に・手頃な価格で・高性能なサーバ機能を利用できます。

[GS2-Document](https://app.gs2.io/docs/index.html) より

## Getting Started

SDKを利用するには GS2 のクレデンシャルが必要です。
[はじめかた](https://app.gs2.io/docs/index.html?java#get-start) の手順に従ってクレデンシャルを発行してください。

### 動作条件

- PHP7.1+

### サンプル

GS2-Account の例

#### 初期化処理

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

#### 同期処理

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

#### 非同期処理

```php
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Request\CreateNamespaceRequest;
use Gs2\Account\Result\CreateNamespaceResult;
use Gs2\Core\Exception\Gs2Exception;
use PHPUnit\Framework\Assert;

// 非同期処理をハンドリングするための Promise が返る
$promise = $client->createNamespaceAsync(
    (new CreateNamespaceRequest())
        ->withName('namespace-0001')
        ->withAuthenticationScript(
            (new ScriptSetting())
                ->withTriggerScriptId('script-0001')
        )
)->then(
    function (CreateNamespaceResult $result) {
        // コールバック形式でハンドリングしたい場合は成功時のハンドラーをここに記述
        Assert::assertNotNull($result->getItem());
        Assert::assertEquals('namespace-0001', $result->getItem()->getName());
        Assert::assertEquals('script-0001', $result->getItem()->getAuthenticationScript()->getTriggerScriptId());
    },
    function (Gs2Exception $e) {
        // コールバック形式でハンドリングしたい場合は失敗時のハンドラーをここに記述
        Assert::fail($e->getMessage());
    }
);

try {
    // Promise を wait することで処理が実行される。戻り値には成功時の結果が返り、失敗時には例外が発生する。
    $result = $promise->wait();
    Assert::assertNotNull($result->getItem());
    Assert::assertEquals('namespace-0001', $result->getItem()->getName());
    Assert::assertEquals('script-0001', $result->getItem()->getAuthenticationScript()->getTriggerScriptId());
} catch (Gs2Exception $e) {
    Assert::fail($e->getMessage());
}
```

Promise に関するドキュメントは https://github.com/guzzle/promises こちらをご確認ください。

その他のサービス・通信方式の初期化処理は [ドキュメント](https://app.gs2.io/docs/index.html?java#gs2-sdk-account-initialize) を参照ください

## フィードバック

フィードバックは [GS2-Feedback](https://github.com/gs2io/gs2-feedback/issues) にお願いします。

*本プロジェクトのコードは gs2-php-sdk-core 以外は全て自動生成されているため、個別に Pull-Request を頂いても対応できません。*

## SDK の詳細仕様

https://app.gs2.io/docs/index.html#gs2-sdk-gs2-sdk