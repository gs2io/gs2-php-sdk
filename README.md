[⇒README in English](README-en.md)

# gs2-php-sdk

Game Server Services(https://gs2.io) を PHP で利用するためのSDKです。

## Game Server Services とは

Game Server Services(GS2) とはゲーム開発に特化したバックエンドサーバサービス(BaaS)です。

GS2は、ゲーム開発者の効率化を目指して生まれた汎用ゲームサーバーのソリューションであり、Games as a Service(GaaS) や Live Gaming などをサポートしています。

このサービスでは、プレイヤーデータの柔軟な管理やデータ分析が可能であり、ゲーム内の資源の流通や消費量を適切に分析して健全な環境を維持することができます。
さらに、ストーリー進行管理や所持品管理などの機能を提供し、ゲームの収益化やプレイヤーエンゲージメントの向上に貢献します。
GS2は、オンライン機能をサポートし、ゲーム開発者がデータの分析や経済管理を容易に行えるようにすることで、ゲームの成功を支援します。

## Getting Started

SDKを利用するには GS2 のクレデンシャルが必要です。
[GS2のセットアップ](https://docs.gs2.io/ja/get_start/tutorial/setup_gs2/) の手順に従ってクレデンシャルを発行してください。

### 動作条件

- PHP7.1+

[⇒GS2の利用を開始 - SDK - 各種プログラミング言語](https://docs.gs2.io/ja/get_start/#%E5%90%84%E7%A8%AE%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%E8%A8%80%E8%AA%9E)

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

## SDK の詳細仕様

各種サービス・通信方式の詳細は

 [⇒API リファレンス](https://docs.gs2.io/ja/api_reference/)

 [⇒API リファレンス - 初期化処理](https://docs.gs2.io/ja/api_reference/initialize/)
 
をご参照ください。
 
*本プロジェクトのコードは gs2-php-sdk-core 以外は全て自動生成されているため、個別に Pull-Request を頂いても対応できません。*
