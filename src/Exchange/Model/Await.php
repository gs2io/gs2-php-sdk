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
 * 交換待機
 *
 * @author Game Server Services, Inc.
 *
 */
class Await implements IModel {
	/**
     * @var string 交換待機
	 */
	protected $awaitId;

	/**
	 * 交換待機を取得
	 *
	 * @return string|null 交換待機
	 */
	public function getAwaitId(): ?string {
		return $this->awaitId;
	}

	/**
	 * 交換待機を設定
	 *
	 * @param string|null $awaitId 交換待機
	 */
	public function setAwaitId(?string $awaitId) {
		$this->awaitId = $awaitId;
	}

	/**
	 * 交換待機を設定
	 *
	 * @param string|null $awaitId 交換待機
	 * @return Await $this
	 */
	public function withAwaitId(?string $awaitId): Await {
		$this->awaitId = $awaitId;
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
	 * @return Await $this
	 */
	public function withUserId(?string $userId): Await {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string 交換レート名
	 */
	protected $rateName;

	/**
	 * 交換レート名を取得
	 *
	 * @return string|null 交換レート名
	 */
	public function getRateName(): ?string {
		return $this->rateName;
	}

	/**
	 * 交換レート名を設定
	 *
	 * @param string|null $rateName 交換レート名
	 */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	/**
	 * 交換レート名を設定
	 *
	 * @param string|null $rateName 交換レート名
	 * @return Await $this
	 */
	public function withRateName(?string $rateName): Await {
		$this->rateName = $rateName;
		return $this;
	}
	/**
     * @var string 交換待機の名前
	 */
	protected $name;

	/**
	 * 交換待機の名前を取得
	 *
	 * @return string|null 交換待機の名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 交換待機の名前を設定
	 *
	 * @param string|null $name 交換待機の名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 交換待機の名前を設定
	 *
	 * @param string|null $name 交換待機の名前
	 * @return Await $this
	 */
	public function withName(?string $name): Await {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int 交換数
	 */
	protected $count;

	/**
	 * 交換数を取得
	 *
	 * @return int|null 交換数
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * 交換数を設定
	 *
	 * @param int|null $count 交換数
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * 交換数を設定
	 *
	 * @param int|null $count 交換数
	 * @return Await $this
	 */
	public function withCount(?int $count): Await {
		$this->count = $count;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $exchangedAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getExchangedAt(): ?int {
		return $this->exchangedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $exchangedAt 作成日時
	 */
	public function setExchangedAt(?int $exchangedAt) {
		$this->exchangedAt = $exchangedAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $exchangedAt 作成日時
	 * @return Await $this
	 */
	public function withExchangedAt(?int $exchangedAt): Await {
		$this->exchangedAt = $exchangedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "awaitId" => $this->awaitId,
            "userId" => $this->userId,
            "rateName" => $this->rateName,
            "name" => $this->name,
            "count" => $this->count,
            "exchangedAt" => $this->exchangedAt,
        );
    }

    public static function fromJson(array $data): Await {
        $model = new Await();
        $model->setAwaitId(isset($data["awaitId"]) ? $data["awaitId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setRateName(isset($data["rateName"]) ? $data["rateName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        $model->setExchangedAt(isset($data["exchangedAt"]) ? $data["exchangedAt"] : null);
        return $model;
    }
}