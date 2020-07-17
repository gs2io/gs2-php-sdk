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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
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
     * @var string ネームスペース名
	 */
	protected $name;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
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
     * @var ScriptSetting キャパシティを更新するときに実行するスクリプト
	 */
	protected $updateMoldScript;

	/**
	 * キャパシティを更新するときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null キャパシティを更新するときに実行するスクリプト
	 */
	public function getUpdateMoldScript(): ?ScriptSetting {
		return $this->updateMoldScript;
	}

	/**
	 * キャパシティを更新するときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateMoldScript キャパシティを更新するときに実行するスクリプト
	 */
	public function setUpdateMoldScript(?ScriptSetting $updateMoldScript) {
		$this->updateMoldScript = $updateMoldScript;
	}

	/**
	 * キャパシティを更新するときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateMoldScript キャパシティを更新するときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withUpdateMoldScript(?ScriptSetting $updateMoldScript): Namespace_ {
		$this->updateMoldScript = $updateMoldScript;
		return $this;
	}
	/**
     * @var ScriptSetting フォームを更新するときに実行するスクリプト
	 */
	protected $updateFormScript;

	/**
	 * フォームを更新するときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null フォームを更新するときに実行するスクリプト
	 */
	public function getUpdateFormScript(): ?ScriptSetting {
		return $this->updateFormScript;
	}

	/**
	 * フォームを更新するときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateFormScript フォームを更新するときに実行するスクリプト
	 */
	public function setUpdateFormScript(?ScriptSetting $updateFormScript) {
		$this->updateFormScript = $updateFormScript;
	}

	/**
	 * フォームを更新するときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $updateFormScript フォームを更新するときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withUpdateFormScript(?ScriptSetting $updateFormScript): Namespace_ {
		$this->updateFormScript = $updateFormScript;
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
            "updateMoldScript" => $this->updateMoldScript->toJson(),
            "updateFormScript" => $this->updateFormScript->toJson(),
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
        $model->setUpdateMoldScript(isset($data["updateMoldScript"]) ? ScriptSetting::fromJson($data["updateMoldScript"]) : null);
        $model->setUpdateFormScript(isset($data["updateFormScript"]) ? ScriptSetting::fromJson($data["updateFormScript"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}