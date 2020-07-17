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
 * リセットタイミングまでの期間のカウンター値
 *
 * @author Game Server Services, Inc.
 *
 */
class ScopedValue implements IModel {
	/**
     * @var string リセットタイミング
	 */
	protected $resetType;

	/**
	 * リセットタイミングを取得
	 *
	 * @return string|null リセットタイミング
	 */
	public function getResetType(): ?string {
		return $this->resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 * @return ScopedValue $this
	 */
	public function withResetType(?string $resetType): ScopedValue {
		$this->resetType = $resetType;
		return $this;
	}
	/**
     * @var int カウント
	 */
	protected $value;

	/**
	 * カウントを取得
	 *
	 * @return int|null カウント
	 */
	public function getValue(): ?int {
		return $this->value;
	}

	/**
	 * カウントを設定
	 *
	 * @param int|null $value カウント
	 */
	public function setValue(?int $value) {
		$this->value = $value;
	}

	/**
	 * カウントを設定
	 *
	 * @param int|null $value カウント
	 * @return ScopedValue $this
	 */
	public function withValue(?int $value): ScopedValue {
		$this->value = $value;
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
	 * @return ScopedValue $this
	 */
	public function withUpdatedAt(?int $updatedAt): ScopedValue {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "resetType" => $this->resetType,
            "value" => $this->value,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ScopedValue {
        $model = new ScopedValue();
        $model->setResetType(isset($data["resetType"]) ? $data["resetType"] : null);
        $model->setValue(isset($data["value"]) ? $data["value"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}