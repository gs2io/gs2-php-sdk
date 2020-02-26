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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;

/**
 * トリガー
 *
 * @author Game Server Services, Inc.
 *
 */
class Trigger implements IModel {
	/**
     * @var string トリガー
	 */
	protected $triggerId;

	/**
	 * トリガーを取得
	 *
	 * @return string|null トリガー
	 */
	public function getTriggerId(): ?string {
		return $this->triggerId;
	}

	/**
	 * トリガーを設定
	 *
	 * @param string|null $triggerId トリガー
	 */
	public function setTriggerId(?string $triggerId) {
		$this->triggerId = $triggerId;
	}

	/**
	 * トリガーを設定
	 *
	 * @param string|null $triggerId トリガー
	 * @return Trigger $this
	 */
	public function withTriggerId(?string $triggerId): Trigger {
		$this->triggerId = $triggerId;
		return $this;
	}
	/**
     * @var string トリガーの名前
	 */
	protected $name;

	/**
	 * トリガーの名前を取得
	 *
	 * @return string|null トリガーの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * トリガーの名前を設定
	 *
	 * @param string|null $name トリガーの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * トリガーの名前を設定
	 *
	 * @param string|null $name トリガーの名前
	 * @return Trigger $this
	 */
	public function withName(?string $name): Trigger {
		$this->name = $name;
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
	 * @return Trigger $this
	 */
	public function withUserId(?string $userId): Trigger {
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
	 * @return Trigger $this
	 */
	public function withCreatedAt(?int $createdAt): Trigger {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int トリガーの有効期限
	 */
	protected $expiresAt;

	/**
	 * トリガーの有効期限を取得
	 *
	 * @return int|null トリガーの有効期限
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * トリガーの有効期限を設定
	 *
	 * @param int|null $expiresAt トリガーの有効期限
	 */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	/**
	 * トリガーの有効期限を設定
	 *
	 * @param int|null $expiresAt トリガーの有効期限
	 * @return Trigger $this
	 */
	public function withExpiresAt(?int $expiresAt): Trigger {
		$this->expiresAt = $expiresAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "triggerId" => $this->triggerId,
            "name" => $this->name,
            "userId" => $this->userId,
            "createdAt" => $this->createdAt,
            "expiresAt" => $this->expiresAt,
        );
    }

    public static function fromJson(array $data): Trigger {
        $model = new Trigger();
        $model->setTriggerId(isset($data["triggerId"]) ? $data["triggerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setExpiresAt(isset($data["expiresAt"]) ? $data["expiresAt"] : null);
        return $model;
    }
}