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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\ScriptSetting;
use Gs2\Quest\Model\LogSetting;

/**
 * クエストを分類するカテゴリーを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストを分類するカテゴリーを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストを分類するカテゴリーを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストを分類するカテゴリーを更新
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
     * @return string|null クエストを分類するカテゴリーを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description クエストを分類するカテゴリーを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting クエスト開始したときに実行するスクリプト */
    private $startQuestScript;

    /**
     * クエスト開始したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを更新
     */
    public function getStartQuestScript(): ?ScriptSetting {
        return $this->startQuestScript;
    }

    /**
     * クエスト開始したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $startQuestScript クエストを分類するカテゴリーを更新
     */
    public function setStartQuestScript(ScriptSetting $startQuestScript) {
        $this->startQuestScript = $startQuestScript;
    }

    /**
     * クエスト開始したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $startQuestScript クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withStartQuestScript(ScriptSetting $startQuestScript): UpdateNamespaceRequest {
        $this->setStartQuestScript($startQuestScript);
        return $this;
    }

    /** @var ScriptSetting クエストクリアしたときに実行するスクリプト */
    private $completeQuestScript;

    /**
     * クエストクリアしたときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを更新
     */
    public function getCompleteQuestScript(): ?ScriptSetting {
        return $this->completeQuestScript;
    }

    /**
     * クエストクリアしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $completeQuestScript クエストを分類するカテゴリーを更新
     */
    public function setCompleteQuestScript(ScriptSetting $completeQuestScript) {
        $this->completeQuestScript = $completeQuestScript;
    }

    /**
     * クエストクリアしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $completeQuestScript クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCompleteQuestScript(ScriptSetting $completeQuestScript): UpdateNamespaceRequest {
        $this->setCompleteQuestScript($completeQuestScript);
        return $this;
    }

    /** @var ScriptSetting クエスト失敗したときに実行するスクリプト */
    private $failedQuestScript;

    /**
     * クエスト失敗したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを更新
     */
    public function getFailedQuestScript(): ?ScriptSetting {
        return $this->failedQuestScript;
    }

    /**
     * クエスト失敗したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $failedQuestScript クエストを分類するカテゴリーを更新
     */
    public function setFailedQuestScript(ScriptSetting $failedQuestScript) {
        $this->failedQuestScript = $failedQuestScript;
    }

    /**
     * クエスト失敗したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $failedQuestScript クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withFailedQuestScript(ScriptSetting $failedQuestScript): UpdateNamespaceRequest {
        $this->setFailedQuestScript($failedQuestScript);
        return $this;
    }

    /** @var string 報酬付与処理をジョブとして追加するキューのネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを取得
     *
     * @return string|null クエストを分類するカテゴリーを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId クエストを分類するカテゴリーを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId): UpdateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null クエストを分類するカテゴリーを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId クエストを分類するカテゴリーを更新
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withKeyId(string $keyId): UpdateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null クエストを分類するカテゴリーを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting クエストを分類するカテゴリーを更新
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting クエストを分類するカテゴリーを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}