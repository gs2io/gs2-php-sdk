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
 * WebSocketセッション
 *
 * @author Game Server Services, Inc.
 *
 */
class Session implements IModel {
	/**
     * @var string WebSocketセッション のGRN
	 */
	protected $sessionId;

	/**
	 * WebSocketセッション のGRNを取得
	 *
	 * @return string|null WebSocketセッション のGRN
	 */
	public function getSessionId(): ?string {
		return $this->sessionId;
	}

	/**
	 * WebSocketセッション のGRNを設定
	 *
	 * @param string|null $sessionId WebSocketセッション のGRN
	 */
	public function setSessionId(?string $sessionId) {
		$this->sessionId = $sessionId;
	}

	/**
	 * WebSocketセッション のGRNを設定
	 *
	 * @param string|null $sessionId WebSocketセッション のGRN
	 * @return Session $this
	 */
	public function withSessionId(?string $sessionId): Session {
		$this->sessionId = $sessionId;
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
	 * @return Session $this
	 */
	public function withOwnerId(?string $ownerId): Session {
		$this->ownerId = $ownerId;
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
	 * @return Session $this
	 */
	public function withUserId(?string $userId): Session {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string WebSocketセッション名
	 */
	protected $sessionName;

	/**
	 * WebSocketセッション名を取得
	 *
	 * @return string|null WebSocketセッション名
	 */
	public function getSessionName(): ?string {
		return $this->sessionName;
	}

	/**
	 * WebSocketセッション名を設定
	 *
	 * @param string|null $sessionName WebSocketセッション名
	 */
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}

	/**
	 * WebSocketセッション名を設定
	 *
	 * @param string|null $sessionName WebSocketセッション名
	 * @return Session $this
	 */
	public function withSessionName(?string $sessionName): Session {
		$this->sessionName = $sessionName;
		return $this;
	}
	/**
     * @var string API Gateway の APIID
	 */
	protected $apiId;

	/**
	 * API Gateway の APIIDを取得
	 *
	 * @return string|null API Gateway の APIID
	 */
	public function getApiId(): ?string {
		return $this->apiId;
	}

	/**
	 * API Gateway の APIIDを設定
	 *
	 * @param string|null $apiId API Gateway の APIID
	 */
	public function setApiId(?string $apiId) {
		$this->apiId = $apiId;
	}

	/**
	 * API Gateway の APIIDを設定
	 *
	 * @param string|null $apiId API Gateway の APIID
	 * @return Session $this
	 */
	public function withApiId(?string $apiId): Session {
		$this->apiId = $apiId;
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
	 * @return Session $this
	 */
	public function withCreatedAt(?int $createdAt): Session {
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
	 * @return Session $this
	 */
	public function withUpdatedAt(?int $updatedAt): Session {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "sessionId" => $this->sessionId,
            "ownerId" => $this->ownerId,
            "userId" => $this->userId,
            "sessionName" => $this->sessionName,
            "apiId" => $this->apiId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Session {
        $model = new Session();
        $model->setSessionId(isset($data["sessionId"]) ? $data["sessionId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setSessionName(isset($data["sessionName"]) ? $data["sessionName"] : null);
        $model->setApiId(isset($data["apiId"]) ? $data["apiId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}