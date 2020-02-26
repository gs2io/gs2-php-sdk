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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\LogSetting;

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
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 景品付与処理をジョブとして追加するキューのネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 景品付与処理をジョブとして追加するキューのネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 景品付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 景品付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId): UpdateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 景品付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 景品付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 景品付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * 景品付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withKeyId(string $keyId): UpdateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 抽選処理時 に実行されるスクリプト のGRN */
    private $lotteryTriggerScriptId;

    /**
     * 抽選処理時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getLotteryTriggerScriptId(): ?string {
        return $this->lotteryTriggerScriptId;
    }

    /**
     * 抽選処理時 に実行されるスクリプト のGRNを設定
     *
     * @param string $lotteryTriggerScriptId ネームスペースを更新
     */
    public function setLotteryTriggerScriptId(string $lotteryTriggerScriptId) {
        $this->lotteryTriggerScriptId = $lotteryTriggerScriptId;
    }

    /**
     * 抽選処理時 に実行されるスクリプト のGRNを設定
     *
     * @param string $lotteryTriggerScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLotteryTriggerScriptId(string $lotteryTriggerScriptId): UpdateNamespaceRequest {
        $this->setLotteryTriggerScriptId($lotteryTriggerScriptId);
        return $this;
    }

    /** @var string 排出テーブル選択時 に実行されるスクリプト のGRN */
    private $choicePrizeTableScriptId;

    /**
     * 排出テーブル選択時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getChoicePrizeTableScriptId(): ?string {
        return $this->choicePrizeTableScriptId;
    }

    /**
     * 排出テーブル選択時 に実行されるスクリプト のGRNを設定
     *
     * @param string $choicePrizeTableScriptId ネームスペースを更新
     */
    public function setChoicePrizeTableScriptId(string $choicePrizeTableScriptId) {
        $this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
    }

    /**
     * 排出テーブル選択時 に実行されるスクリプト のGRNを設定
     *
     * @param string $choicePrizeTableScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withChoicePrizeTableScriptId(string $choicePrizeTableScriptId): UpdateNamespaceRequest {
        $this->setChoicePrizeTableScriptId($choicePrizeTableScriptId);
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