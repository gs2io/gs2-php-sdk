<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\LogSetting;

/**
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var bool 交換結果の受け取りに待ち時間の発生する交換機能を利用するか */
    private $enableAwaitExchange;

    /**
     * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getEnableAwaitExchange(): ?bool {
        return $this->enableAwaitExchange;
    }

    /**
     * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを設定
     *
     * @param bool $enableAwaitExchange ネームスペースを更新
     */
    public function setEnableAwaitExchange(bool $enableAwaitExchange = null) {
        $this->enableAwaitExchange = $enableAwaitExchange;
    }

    /**
     * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを設定
     *
     * @param bool $enableAwaitExchange ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withEnableAwaitExchange(bool $enableAwaitExchange = null): UpdateNamespaceRequest {
        $this->setEnableAwaitExchange($enableAwaitExchange);
        return $this;
    }

    /** @var bool 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できない */
    private $enableDirectExchange;

    /**
     * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getEnableDirectExchange(): ?bool {
        return $this->enableDirectExchange;
    }

    /**
     * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを設定
     *
     * @param bool $enableDirectExchange ネームスペースを更新
     */
    public function setEnableDirectExchange(bool $enableDirectExchange = null) {
        $this->enableDirectExchange = $enableDirectExchange;
    }

    /**
     * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを設定
     *
     * @param bool $enableDirectExchange ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withEnableDirectExchange(bool $enableDirectExchange = null): UpdateNamespaceRequest {
        $this->setEnableDirectExchange($enableDirectExchange);
        return $this;
    }

    /** @var string 交換処理をジョブとして追加するキューのネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId = null) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId = null): UpdateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 交換処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): UpdateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}