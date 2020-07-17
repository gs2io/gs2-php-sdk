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
 * Firebaseデバイストークン
 *
 * @author Game Server Services, Inc.
 *
 */
class FirebaseToken implements IModel {
	/**
     * @var string Firebaseデバイストークン のGRN
	 */
	protected $firebaseTokenId;

	/**
	 * Firebaseデバイストークン のGRNを取得
	 *
	 * @return string|null Firebaseデバイストークン のGRN
	 */
	public function getFirebaseTokenId(): ?string {
		return $this->firebaseTokenId;
	}

	/**
	 * Firebaseデバイストークン のGRNを設定
	 *
	 * @param string|null $firebaseTokenId Firebaseデバイストークン のGRN
	 */
	public function setFirebaseTokenId(?string $firebaseTokenId) {
		$this->firebaseTokenId = $firebaseTokenId;
	}

	/**
	 * Firebaseデバイストークン のGRNを設定
	 *
	 * @param string|null $firebaseTokenId Firebaseデバイストークン のGRN
	 * @return FirebaseToken $this
	 */
	public function withFirebaseTokenId(?string $firebaseTokenId): FirebaseToken {
		$this->firebaseTokenId = $firebaseTokenId;
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
	 * @return FirebaseToken $this
	 */
	public function withOwnerId(?string $ownerId): FirebaseToken {
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
	 * @return FirebaseToken $this
	 */
	public function withUserId(?string $userId): FirebaseToken {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string Firebase Cloud Messaging のデバイストークン
	 */
	protected $token;

	/**
	 * Firebase Cloud Messaging のデバイストークンを取得
	 *
	 * @return string|null Firebase Cloud Messaging のデバイストークン
	 */
	public function getToken(): ?string {
		return $this->token;
	}

	/**
	 * Firebase Cloud Messaging のデバイストークンを設定
	 *
	 * @param string|null $token Firebase Cloud Messaging のデバイストークン
	 */
	public function setToken(?string $token) {
		$this->token = $token;
	}

	/**
	 * Firebase Cloud Messaging のデバイストークンを設定
	 *
	 * @param string|null $token Firebase Cloud Messaging のデバイストークン
	 * @return FirebaseToken $this
	 */
	public function withToken(?string $token): FirebaseToken {
		$this->token = $token;
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
	 * @return FirebaseToken $this
	 */
	public function withCreatedAt(?int $createdAt): FirebaseToken {
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
	 * @return FirebaseToken $this
	 */
	public function withUpdatedAt(?int $updatedAt): FirebaseToken {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "firebaseTokenId" => $this->firebaseTokenId,
            "ownerId" => $this->ownerId,
            "userId" => $this->userId,
            "token" => $this->token,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): FirebaseToken {
        $model = new FirebaseToken();
        $model->setFirebaseTokenId(isset($data["firebaseTokenId"]) ? $data["firebaseTokenId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setToken(isset($data["token"]) ? $data["token"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}