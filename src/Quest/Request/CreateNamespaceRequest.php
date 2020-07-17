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
 * クエストを分類するカテゴリーを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $name;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストを分類するカテゴリーを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $name クエストを分類するカテゴリーを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $name クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name = null): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null クエストを分類するカテゴリーを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description クエストを分類するカテゴリーを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description = null): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting クエスト開始したときに実行するスクリプト */
    private $startQuestScript;

    /**
     * クエスト開始したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを新規作成
     */
    public function getStartQuestScript(): ?ScriptSetting {
        return $this->startQuestScript;
    }

    /**
     * クエスト開始したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $startQuestScript クエストを分類するカテゴリーを新規作成
     */
    public function setStartQuestScript(ScriptSetting $startQuestScript = null) {
        $this->startQuestScript = $startQuestScript;
    }

    /**
     * クエスト開始したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $startQuestScript クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withStartQuestScript(ScriptSetting $startQuestScript = null): CreateNamespaceRequest {
        $this->setStartQuestScript($startQuestScript);
        return $this;
    }

    /** @var ScriptSetting クエストクリアしたときに実行するスクリプト */
    private $completeQuestScript;

    /**
     * クエストクリアしたときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを新規作成
     */
    public function getCompleteQuestScript(): ?ScriptSetting {
        return $this->completeQuestScript;
    }

    /**
     * クエストクリアしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $completeQuestScript クエストを分類するカテゴリーを新規作成
     */
    public function setCompleteQuestScript(ScriptSetting $completeQuestScript = null) {
        $this->completeQuestScript = $completeQuestScript;
    }

    /**
     * クエストクリアしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $completeQuestScript クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCompleteQuestScript(ScriptSetting $completeQuestScript = null): CreateNamespaceRequest {
        $this->setCompleteQuestScript($completeQuestScript);
        return $this;
    }

    /** @var ScriptSetting クエスト失敗したときに実行するスクリプト */
    private $failedQuestScript;

    /**
     * クエスト失敗したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null クエストを分類するカテゴリーを新規作成
     */
    public function getFailedQuestScript(): ?ScriptSetting {
        return $this->failedQuestScript;
    }

    /**
     * クエスト失敗したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $failedQuestScript クエストを分類するカテゴリーを新規作成
     */
    public function setFailedQuestScript(ScriptSetting $failedQuestScript = null) {
        $this->failedQuestScript = $failedQuestScript;
    }

    /**
     * クエスト失敗したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $failedQuestScript クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withFailedQuestScript(ScriptSetting $failedQuestScript = null): CreateNamespaceRequest {
        $this->setFailedQuestScript($failedQuestScript);
        return $this;
    }

    /** @var string 報酬付与処理をジョブとして追加するキューのネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを取得
     *
     * @return string|null クエストを分類するカテゴリーを新規作成
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId クエストを分類するカテゴリーを新規作成
     */
    public function setQueueNamespaceId(string $queueNamespaceId = null) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId = null): CreateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null クエストを分類するカテゴリーを新規作成
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId クエストを分類するカテゴリーを新規作成
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): CreateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null クエストを分類するカテゴリーを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting クエストを分類するカテゴリーを新規作成
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting クエストを分類するカテゴリーを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}