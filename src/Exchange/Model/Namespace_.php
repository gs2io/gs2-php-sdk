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

namespace Gs2\Exchange\Model;

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
     * @var bool 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できない
	 */
	protected $enableDirectExchange;

	/**
	 * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを取得
	 *
	 * @return bool|null 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できない
	 */
	public function getEnableDirectExchange(): ?bool {
		return $this->enableDirectExchange;
	}

	/**
	 * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを設定
	 *
	 * @param bool|null $enableDirectExchange 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できない
	 */
	public function setEnableDirectExchange(?bool $enableDirectExchange) {
		$this->enableDirectExchange = $enableDirectExchange;
	}

	/**
	 * 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できないを設定
	 *
	 * @param bool|null $enableDirectExchange 直接交換APIの呼び出しを許可する。許可しない場合はスタンプシート経由でしか交換できない
	 * @return Namespace_ $this
	 */
	public function withEnableDirectExchange(?bool $enableDirectExchange): Namespace_ {
		$this->enableDirectExchange = $enableDirectExchange;
		return $this;
	}
	/**
     * @var bool 交換結果の受け取りに待ち時間の発生する交換機能を利用するか
	 */
	protected $enableAwaitExchange;

	/**
	 * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを取得
	 *
	 * @return bool|null 交換結果の受け取りに待ち時間の発生する交換機能を利用するか
	 */
	public function getEnableAwaitExchange(): ?bool {
		return $this->enableAwaitExchange;
	}

	/**
	 * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを設定
	 *
	 * @param bool|null $enableAwaitExchange 交換結果の受け取りに待ち時間の発生する交換機能を利用するか
	 */
	public function setEnableAwaitExchange(?bool $enableAwaitExchange) {
		$this->enableAwaitExchange = $enableAwaitExchange;
	}

	/**
	 * 交換結果の受け取りに待ち時間の発生する交換機能を利用するかを設定
	 *
	 * @param bool|null $enableAwaitExchange 交換結果の受け取りに待ち時間の発生する交換機能を利用するか
	 * @return Namespace_ $this
	 */
	public function withEnableAwaitExchange(?bool $enableAwaitExchange): Namespace_ {
		$this->enableAwaitExchange = $enableAwaitExchange;
		return $this;
	}
	/**
     * @var string 交換処理をジョブとして追加するキューのネームスペース のGRN
	 */
	protected $queueNamespaceId;

	/**
	 * 交換処理をジョブとして追加するキューのネームスペース のGRNを取得
	 *
	 * @return string|null 交換処理をジョブとして追加するキューのネームスペース のGRN
	 */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	/**
	 * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 交換処理をジョブとして追加するキューのネームスペース のGRN
	 */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	/**
	 * 交換処理をジョブとして追加するキューのネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 交換処理をジョブとして追加するキューのネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}
	/**
     * @var string 交換処理のスタンプシートで使用する暗号鍵GRN
	 */
	protected $keyId;

	/**
	 * 交換処理のスタンプシートで使用する暗号鍵GRNを取得
	 *
	 * @return string|null 交換処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function getKeyId(): ?string {
		return $this->keyId;
	}

	/**
	 * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 交換処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	/**
	 * 交換処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 交換処理のスタンプシートで使用する暗号鍵GRN
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
            "enableDirectExchange" => $this->enableDirectExchange,
            "enableAwaitExchange" => $this->enableAwaitExchange,
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
        $model->setEnableDirectExchange(isset($data["enableDirectExchange"]) ? $data["enableDirectExchange"] : null);
        $model->setEnableAwaitExchange(isset($data["enableAwaitExchange"]) ? $data["enableAwaitExchange"] : null);
        $model->setQueueNamespaceId(isset($data["queueNamespaceId"]) ? $data["queueNamespaceId"] : null);
        $model->setKeyId(isset($data["keyId"]) ? $data["keyId"] : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}