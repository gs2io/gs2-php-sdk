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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Stamina\Model\LogSetting;

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
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRN */
    private $overflowTriggerScriptId;

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getOverflowTriggerScriptId(): ?string {
        return $this->overflowTriggerScriptId;
    }

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを設定
     *
     * @param string $overflowTriggerScriptId ネームスペースを更新
     */
    public function setOverflowTriggerScriptId(string $overflowTriggerScriptId) {
        $this->overflowTriggerScriptId = $overflowTriggerScriptId;
    }

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを設定
     *
     * @param string $overflowTriggerScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withOverflowTriggerScriptId(string $overflowTriggerScriptId): UpdateNamespaceRequest {
        $this->setOverflowTriggerScriptId($overflowTriggerScriptId);
        return $this;
    }

    /** @var string スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRN */
    private $overflowTriggerNamespaceId;

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getOverflowTriggerNamespaceId(): ?string {
        return $this->overflowTriggerNamespaceId;
    }

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを設定
     *
     * @param string $overflowTriggerNamespaceId ネームスペースを更新
     */
    public function setOverflowTriggerNamespaceId(string $overflowTriggerNamespaceId) {
        $this->overflowTriggerNamespaceId = $overflowTriggerNamespaceId;
    }

    /**
     * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを設定
     *
     * @param string $overflowTriggerNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withOverflowTriggerNamespaceId(string $overflowTriggerNamespaceId): UpdateNamespaceRequest {
        $this->setOverflowTriggerNamespaceId($overflowTriggerNamespaceId);
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
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}