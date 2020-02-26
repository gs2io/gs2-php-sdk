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

namespace Gs2\Key\Model;

use Gs2\Core\Model\IModel;

/**
 * 暗号鍵
 *
 * @author Game Server Services, Inc.
 *
 */
class Key implements IModel {
	/**
     * @var string 暗号鍵
	 */
	protected $keyId;

	/**
	 * 暗号鍵を取得
	 *
	 * @return string|null 暗号鍵
	 */
	public function getKeyId(): ?string {
		return $this->keyId;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $keyId 暗号鍵
	 */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $keyId 暗号鍵
	 * @return Key $this
	 */
	public function withKeyId(?string $keyId): Key {
		$this->keyId = $keyId;
		return $this;
	}
	/**
     * @var string 暗号鍵名
	 */
	protected $name;

	/**
	 * 暗号鍵名を取得
	 *
	 * @return string|null 暗号鍵名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 暗号鍵名を設定
	 *
	 * @param string|null $name 暗号鍵名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 暗号鍵名を設定
	 *
	 * @param string|null $name 暗号鍵名
	 * @return Key $this
	 */
	public function withName(?string $name): Key {
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
	 * @return Key $this
	 */
	public function withDescription(?string $description): Key {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 暗号鍵
	 */
	protected $secret;

	/**
	 * 暗号鍵を取得
	 *
	 * @return string|null 暗号鍵
	 */
	public function getSecret(): ?string {
		return $this->secret;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $secret 暗号鍵
	 */
	public function setSecret(?string $secret) {
		$this->secret = $secret;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string|null $secret 暗号鍵
	 * @return Key $this
	 */
	public function withSecret(?string $secret): Key {
		$this->secret = $secret;
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
	 * @return Key $this
	 */
	public function withCreatedAt(?int $createdAt): Key {
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
	 * @return Key $this
	 */
	public function withUpdatedAt(?int $updatedAt): Key {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "keyId" => $this->keyId,
            "name" => $this->name,
            "description" => $this->description,
            "secret" => $this->secret,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Key {
        $model = new Key();
        $model->setKeyId(isset($data["keyId"]) ? $data["keyId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setSecret(isset($data["secret"]) ? $data["secret"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}