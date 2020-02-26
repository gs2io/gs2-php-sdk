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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;

/**
 * クレデンシャル
 *
 * @author Game Server Services, Inc.
 *
 */
class Identifier implements IModel {
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
	 * @return Identifier $this
	 */
	public function withOwnerId(?string $ownerId): Identifier {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string クライアントID
	 */
	protected $clientId;

	/**
	 * クライアントIDを取得
	 *
	 * @return string|null クライアントID
	 */
	public function getClientId(): ?string {
		return $this->clientId;
	}

	/**
	 * クライアントIDを設定
	 *
	 * @param string|null $clientId クライアントID
	 */
	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}

	/**
	 * クライアントIDを設定
	 *
	 * @param string|null $clientId クライアントID
	 * @return Identifier $this
	 */
	public function withClientId(?string $clientId): Identifier {
		$this->clientId = $clientId;
		return $this;
	}
	/**
     * @var string ユーザー名
	 */
	protected $userName;

	/**
	 * ユーザー名を取得
	 *
	 * @return string|null ユーザー名
	 */
	public function getUserName(): ?string {
		return $this->userName;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $userName ユーザー名
	 */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	/**
	 * ユーザー名を設定
	 *
	 * @param string|null $userName ユーザー名
	 * @return Identifier $this
	 */
	public function withUserName(?string $userName): Identifier {
		$this->userName = $userName;
		return $this;
	}
	/**
     * @var string クライアントシークレット
	 */
	protected $clientSecret;

	/**
	 * クライアントシークレットを取得
	 *
	 * @return string|null クライアントシークレット
	 */
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	/**
	 * クライアントシークレットを設定
	 *
	 * @param string|null $clientSecret クライアントシークレット
	 */
	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}

	/**
	 * クライアントシークレットを設定
	 *
	 * @param string|null $clientSecret クライアントシークレット
	 * @return Identifier $this
	 */
	public function withClientSecret(?string $clientSecret): Identifier {
		$this->clientSecret = $clientSecret;
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
	 * @return Identifier $this
	 */
	public function withCreatedAt(?int $createdAt): Identifier {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ownerId" => $this->ownerId,
            "clientId" => $this->clientId,
            "userName" => $this->userName,
            "clientSecret" => $this->clientSecret,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Identifier {
        $model = new Identifier();
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setClientId(isset($data["clientId"]) ? $data["clientId"] : null);
        $model->setUserName(isset($data["userName"]) ? $data["userName"] : null);
        $model->setClientSecret(isset($data["clientSecret"]) ? $data["clientSecret"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}