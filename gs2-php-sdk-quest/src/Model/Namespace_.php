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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;

/**
 * クエストを分類するカテゴリー
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string クエストを分類するカテゴリー
	 */
	protected $namespaceId;

	/**
	 * クエストを分類するカテゴリーを取得
	 *
	 * @return string|null クエストを分類するカテゴリー
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * クエストを分類するカテゴリーを設定
	 *
	 * @param string|null $namespaceId クエストを分類するカテゴリー
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * クエストを分類するカテゴリーを設定
	 *
	 * @param string|null $namespaceId クエストを分類するカテゴリー
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string カテゴリ名
	 */
	protected $name;

	/**
	 * カテゴリ名を取得
	 *
	 * @return string|null カテゴリ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $name カテゴリ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $name カテゴリ名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var ScriptSetting クエスト開始したときに実行するスクリプト
	 */
	protected $startQuestScript;

	/**
	 * クエスト開始したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null クエスト開始したときに実行するスクリプト
	 */
	public function getStartQuestScript(): ?ScriptSetting {
		return $this->startQuestScript;
	}

	/**
	 * クエスト開始したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $startQuestScript クエスト開始したときに実行するスクリプト
	 */
	public function setStartQuestScript(?ScriptSetting $startQuestScript) {
		$this->startQuestScript = $startQuestScript;
	}

	/**
	 * クエスト開始したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $startQuestScript クエスト開始したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withStartQuestScript(?ScriptSetting $startQuestScript): Namespace_ {
		$this->startQuestScript = $startQuestScript;
		return $this;
	}
	/**
     * @var ScriptSetting クエストクリアしたときに実行するスクリプト
	 */
	protected $completeQuestScript;

	/**
	 * クエストクリアしたときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null クエストクリアしたときに実行するスクリプト
	 */
	public function getCompleteQuestScript(): ?ScriptSetting {
		return $this->completeQuestScript;
	}

	/**
	 * クエストクリアしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $completeQuestScript クエストクリアしたときに実行するスクリプト
	 */
	public function setCompleteQuestScript(?ScriptSetting $completeQuestScript) {
		$this->completeQuestScript = $completeQuestScript;
	}

	/**
	 * クエストクリアしたときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $completeQuestScript クエストクリアしたときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCompleteQuestScript(?ScriptSetting $completeQuestScript): Namespace_ {
		$this->completeQuestScript = $completeQuestScript;
		return $this;
	}
	/**
     * @var ScriptSetting クエスト失敗したときに実行するスクリプト
	 */
	protected $failedQuestScript;

	/**
	 * クエスト失敗したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null クエスト失敗したときに実行するスクリプト
	 */
	public function getFailedQuestScript(): ?ScriptSetting {
		return $this->failedQuestScript;
	}

	/**
	 * クエスト失敗したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $failedQuestScript クエスト失敗したときに実行するスクリプト
	 */
	public function setFailedQuestScript(?ScriptSetting $failedQuestScript) {
		$this->failedQuestScript = $failedQuestScript;
	}

	/**
	 * クエスト失敗したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $failedQuestScript クエスト失敗したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withFailedQuestScript(?ScriptSetting $failedQuestScript): Namespace_ {
		$this->failedQuestScript = $failedQuestScript;
		return $this;
	}
	/**
     * @var string 報酬付与処理をジョブとして追加するキューのネームスペース のGRN
	 */
	protected $queueNamespaceId;

	/**
	 * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを取得
	 *
	 * @return string|null 報酬付与処理をジョブとして追加するキューのネームスペース のGRN
	 */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	/**
	 * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 報酬付与処理をジョブとして追加するキューのネームスペース のGRN
	 */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	/**
	 * 報酬付与処理をジョブとして追加するキューのネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 報酬付与処理をジョブとして追加するキューのネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}
	/**
     * @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	protected $keyId;

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
	 *
	 * @return string|null 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function getKeyId(): ?string {
		return $this->keyId;
	}

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 * @return Namespace_ $this
	 */
	public function withKeyId(?string $keyId): Namespace_ {
		$this->keyId = $keyId;
		return $this;
	}
	/**
     * @var LogSetting ログの出力設定
	 */
	protected $logSetting;

	/**
	 * ログの出力設定を取得
	 *
	 * @return LogSetting|null ログの出力設定
	 */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 * @return Namespace_ $this
	 */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "startQuestScript" => $this->startQuestScript->toJson(),
            "completeQuestScript" => $this->completeQuestScript->toJson(),
            "failedQuestScript" => $this->failedQuestScript->toJson(),
            "queueNamespaceId" => $this->queueNamespaceId,
            "keyId" => $this->keyId,
            "logSetting" => $this->logSetting->toJson(),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setStartQuestScript(isset($data["startQuestScript"]) ? ScriptSetting::fromJson($data["startQuestScript"]) : null);
        $model->setCompleteQuestScript(isset($data["completeQuestScript"]) ? ScriptSetting::fromJson($data["completeQuestScript"]) : null);
        $model->setFailedQuestScript(isset($data["failedQuestScript"]) ? ScriptSetting::fromJson($data["failedQuestScript"]) : null);
        $model->setQueueNamespaceId(isset($data["queueNamespaceId"]) ? $data["queueNamespaceId"] : null);
        $model->setKeyId(isset($data["keyId"]) ? $data["keyId"] : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}