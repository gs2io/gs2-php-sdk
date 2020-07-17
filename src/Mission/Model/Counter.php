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

namespace Gs2\Mission\Model;

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
     * @var string カウンター名
	 */
	protected $name;

	/**
	 * カウンター名を取得
	 *
	 * @return string|null カウンター名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $name カウンター名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $name カウンター名
	 * @return Counter $this
	 */
	public function withName(?string $name): Counter {
		$this->name = $name;
		return $this;
	}
	/**
     * @var ScopedValue[] 値
	 */
	protected $values;

	/**
	 * 値を取得
	 *
	 * @return ScopedValue[]|null 値
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * 値を設定
	 *
	 * @param ScopedValue[]|null $values 値
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * 値を設定
	 *
	 * @param ScopedValue[]|null $values 値
	 * @return Counter $this
	 */
	public function withValues(?array $values): Counter {
		$this->values = $values;
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
            "userId" => $this->userId,
            "name" => $this->name,
            "values" => array_map(
                function (ScopedValue $v) {
                    return $v->toJson();
                },
                $this->values == null ? [] : $this->values
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Counter {
        $model = new Counter();
        $model->setCounterId(isset($data["counterId"]) ? $data["counterId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setValues(array_map(
                function ($v) {
                    return ScopedValue::fromJson($v);
                },
                isset($data["values"]) ? $data["values"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}