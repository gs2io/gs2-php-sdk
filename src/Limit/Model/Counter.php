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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;

/**
 * カウンター
 *
 * @author Game Server Services, Inc.
 *
 */
class Counter implements IModel {
	/**
     * @var string カウンター
	 */
	protected $counterId;

	/**
	 * カウンターを取得
	 *
	 * @return string|null カウンター
	 */
	public function getCounterId(): ?string {
		return $this->counterId;
	}

	/**
	 * カウンターを設定
	 *
	 * @param string|null $counterId カウンター
	 */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}

	/**
	 * カウンターを設定
	 *
	 * @param string|null $counterId カウンター
	 * @return Counter $this
	 */
	public function withCounterId(?string $counterId): Counter {
		$this->counterId = $counterId;
		return $this;
	}
	/**
     * @var string 回数制限の種類の名前
	 */
	protected $limitName;

	/**
	 * 回数制限の種類の名前を取得
	 *
	 * @return string|null 回数制限の種類の名前
	 */
	public function getLimitName(): ?string {
		return $this->limitName;
	}

	/**
	 * 回数制限の種類の名前を設定
	 *
	 * @param string|null $limitName 回数制限の種類の名前
	 */
	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}

	/**
	 * 回数制限の種類の名前を設定
	 *
	 * @param string|null $limitName 回数制限の種類の名前
	 * @return Counter $this
	 */
	public function withLimitName(?string $limitName): Counter {
		$this->limitName = $limitName;
		return $this;
	}
	/**
     * @var string カウンターの名前
	 */
	protected $name;

	/**
	 * カウンターの名前を取得
	 *
	 * @return string|null カウンターの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カウンターの名前を設定
	 *
	 * @param string|null $name カウンターの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カウンターの名前を設定
	 *
	 * @param string|null $name カウンターの名前
	 * @return Counter $this
	 */
	public function withName(?string $name): Counter {
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
	 * @return Counter $this
	 */
	public function withUserId(?string $userId): Counter {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var int カウント値
	 */
	protected $count;

	/**
	 * カウント値を取得
	 *
	 * @return int|null カウント値
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * カウント値を設定
	 *
	 * @param int|null $count カウント値
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * カウント値を設定
	 *
	 * @param int|null $count カウント値
	 * @return Counter $this
	 */
	public function withCount(?int $count): Counter {
		$this->count = $count;
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
	 * @return Counter $this
	 */
	public function withCreatedAt(?int $createdAt): Counter {
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
	 * @return Counter $this
	 */
	public function withUpdatedAt(?int $updatedAt): Counter {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "counterId" => $this->counterId,
            "limitName" => $this->limitName,
            "name" => $this->name,
            "userId" => $this->userId,
            "count" => $this->count,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Counter {
        $model = new Counter();
        $model->setCounterId(isset($data["counterId"]) ? $data["counterId"] : null);
        $model->setLimitName(isset($data["limitName"]) ? $data["limitName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}