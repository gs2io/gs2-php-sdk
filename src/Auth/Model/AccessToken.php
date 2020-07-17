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

namespace Gs2\Auth\Model;

use Gs2\Core\Model\IModel;

/**
 * アクセストークン
 *
 * @author Game Server Services, Inc.
 *
 */
class AccessToken implements IModel {
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
	 * @return AccessToken $this
	 */
	public function withOwnerId(?string $ownerId): AccessToken {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string アクセストークン
	 */
	protected $token;

	/**
	 * アクセストークンを取得
	 *
	 * @return string|null アクセストークン
	 */
	public function getToken(): ?string {
		return $this->token;
	}

	/**
	 * アクセストークンを設定
	 *
	 * @param string|null $token アクセストークン
	 */
	public function setToken(?string $token) {
		$this->token = $token;
	}

	/**
	 * アクセストークンを設定
	 *
	 * @param string|null $token アクセストークン
	 * @return AccessToken $this
	 */
	public function withToken(?string $token): AccessToken {
		$this->token = $token;
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
	 * @return AccessToken $this
	 */
	public function withUserId(?string $userId): AccessToken {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int 有効期限
	 */
	protected $expire;

	/**
	 * 有効期限を取得
	 *
	 * @return int|null 有効期限
	 */
	public function getExpire(): ?int {
		return $this->expire;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int|null $expire 有効期限
	 */
	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int|null $expire 有効期限
	 * @return AccessToken $this
	 */
	public function withExpire(?int $expire): AccessToken {
		$this->expire = $expire;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ownerId" => $this->ownerId,
            "token" => $this->token,
            "userId" => $this->userId,
            "expire" => $this->expire,
        );
    }

    public static function fromJson(array $data): AccessToken {
        $model = new AccessToken();
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setToken(isset($data["token"]) ? $data["token"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setExpire(isset($data["expire"]) ? $data["expire"] : null);
        return $model;
    }
}