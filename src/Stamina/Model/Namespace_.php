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

namespace Gs2\Stamina\Model;

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
     * @var string 説明文
	 */
	protected $description;

	/**
	 * 説明文を取得
	 *
	 * @return string|null 説明文
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRN
	 */
	protected $overflowTriggerScriptId;

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを取得
	 *
	 * @return string|null スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRN
	 */
	public function getOverflowTriggerScriptId(): ?string {
		return $this->overflowTriggerScriptId;
	}

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを設定
	 *
	 * @param string|null $overflowTriggerScriptId スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRN
	 */
	public function setOverflowTriggerScriptId(?string $overflowTriggerScriptId) {
		$this->overflowTriggerScriptId = $overflowTriggerScriptId;
	}

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRNを設定
	 *
	 * @param string|null $overflowTriggerScriptId スタミナオーバーフロー上限に当たって回復できなかったスタミナを通知する スクリプト のGRN
	 * @return Namespace_ $this
	 */
	public function withOverflowTriggerScriptId(?string $overflowTriggerScriptId): Namespace_ {
		$this->overflowTriggerScriptId = $overflowTriggerScriptId;
		return $this;
	}
	/**
     * @var string スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRN
	 */
	protected $overflowTriggerQueueId;

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを取得
	 *
	 * @return string|null スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRN
	 */
	public function getOverflowTriggerQueueId(): ?string {
		return $this->overflowTriggerQueueId;
	}

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを設定
	 *
	 * @param string|null $overflowTriggerQueueId スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRN
	 */
	public function setOverflowTriggerQueueId(?string $overflowTriggerQueueId) {
		$this->overflowTriggerQueueId = $overflowTriggerQueueId;
	}

	/**
	 * スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRNを設定
	 *
	 * @param string|null $overflowTriggerQueueId スタミナオーバーフロー上限に当たって回復できなかったスタミナを追加する ネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withOverflowTriggerQueueId(?string $overflowTriggerQueueId): Namespace_ {
		$this->overflowTriggerQueueId = $overflowTriggerQueueId;
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
            "overflowTriggerScriptId" => $this->overflowTriggerScriptId,
            "overflowTriggerQueueId" => $this->overflowTriggerQueueId,
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
        $model->setOverflowTriggerScriptId(isset($data["overflowTriggerScriptId"]) ? $data["overflowTriggerScriptId"] : null);
        $model->setOverflowTriggerQueueId(isset($data["overflowTriggerQueueId"]) ? $data["overflowTriggerQueueId"] : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}