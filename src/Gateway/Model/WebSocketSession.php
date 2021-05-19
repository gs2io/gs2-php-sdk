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

namespace Gs2\Gateway\Model;

use Gs2\Core\Model\IModel;

/**
 * Websocketセッション
 *
 * @author Game Server Services, Inc.
 *
 */
class WebSocketSession implements IModel {
	/**
     * @var string コネクションID
	 */
	protected $connectionId;

	/**
	 * コネクションIDを取得
	 *
	 * @return string|null コネクションID
	 */
	public function getConnectionId(): ?string {
		return $this->connectionId;
	}

	/**
	 * コネクションIDを設定
	 *
	 * @param string|null $connectionId コネクションID
	 */
	public function setConnectionId(?string $connectionId) {
		$this->connectionId = $connectionId;
	}

	/**
	 * コネクションIDを設定
	 *
	 * @param string|null $connectionId コネクションID
	 * @return WebSocketSession $this
	 */
	public function withConnectionId(?string $connectionId): WebSocketSession {
		$this->connectionId = $connectionId;
		return $this;
	}
	/**
     * @var string API ID
	 */
	protected $apiId;

	/**
	 * API IDを取得
	 *
	 * @return string|null API ID
	 */
	public function getApiId(): ?string {
		return $this->apiId;
	}

	/**
	 * API IDを設定
	 *
	 * @param string|null $apiId API ID
	 */
	public function setApiId(?string $apiId) {
		$this->apiId = $apiId;
	}

	/**
	 * API IDを設定
	 *
	 * @param string|null $apiId API ID
	 * @return WebSocketSession $this
	 */
	public function withApiId(?string $apiId): WebSocketSession {
		$this->apiId = $apiId;
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
	 * @return WebSocketSession $this
	 */
	public function withOwnerId(?string $ownerId): WebSocketSession {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペース名
	 */
	protected $namespaceName;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $namespaceName ネームスペース名
	 * @return WebSocketSession $this
	 */
	public function withNamespaceName(?string $namespaceName): WebSocketSession {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return WebSocketSession $this
	 */
	public function withUserId(?string $userId): WebSocketSession {
		$this->userId = $userId;
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
	 * @return WebSocketSession $this
	 */
	public function withCreatedAt(?int $createdAt): WebSocketSession {
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
	 * @return WebSocketSession $this
	 */
	public function withUpdatedAt(?int $updatedAt): WebSocketSession {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "connectionId" => $this->connectionId,
            "apiId" => $this->apiId,
            "ownerId" => $this->ownerId,
            "namespaceName" => $this->namespaceName,
            "userId" => $this->userId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): WebSocketSession {
        $model = new WebSocketSession();
        $model->setConnectionId(isset($data["connectionId"]) ? $data["connectionId"] : null);
        $model->setApiId(isset($data["apiId"]) ? $data["apiId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setNamespaceName(isset($data["namespaceName"]) ? $data["namespaceName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}