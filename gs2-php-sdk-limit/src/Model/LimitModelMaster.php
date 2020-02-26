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
 * 回数制限の種類マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class LimitModelMaster implements IModel {
	/**
     * @var string 回数制限の種類マスター
	 */
	protected $limitModelId;

	/**
	 * 回数制限の種類マスターを取得
	 *
	 * @return string|null 回数制限の種類マスター
	 */
	public function getLimitModelId(): ?string {
		return $this->limitModelId;
	}

	/**
	 * 回数制限の種類マスターを設定
	 *
	 * @param string|null $limitModelId 回数制限の種類マスター
	 */
	public function setLimitModelId(?string $limitModelId) {
		$this->limitModelId = $limitModelId;
	}

	/**
	 * 回数制限の種類マスターを設定
	 *
	 * @param string|null $limitModelId 回数制限の種類マスター
	 * @return LimitModelMaster $this
	 */
	public function withLimitModelId(?string $limitModelId): LimitModelMaster {
		$this->limitModelId = $limitModelId;
		return $this;
	}
	/**
     * @var string 回数制限の種類名
	 */
	protected $name;

	/**
	 * 回数制限の種類名を取得
	 *
	 * @return string|null 回数制限の種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 回数制限の種類名を設定
	 *
	 * @param string|null $name 回数制限の種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 回数制限の種類名を設定
	 *
	 * @param string|null $name 回数制限の種類名
	 * @return LimitModelMaster $this
	 */
	public function withName(?string $name): LimitModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 回数制限の種類マスターの説明
	 */
	protected $description;

	/**
	 * 回数制限の種類マスターの説明を取得
	 *
	 * @return string|null 回数制限の種類マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 回数制限の種類マスターの説明を設定
	 *
	 * @param string|null $description 回数制限の種類マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 回数制限の種類マスターの説明を設定
	 *
	 * @param string|null $description 回数制限の種類マスターの説明
	 * @return LimitModelMaster $this
	 */
	public function withDescription(?string $description): LimitModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 回数制限の種類のメタデータ
	 */
	protected $metadata;

	/**
	 * 回数制限の種類のメタデータを取得
	 *
	 * @return string|null 回数制限の種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 回数制限の種類のメタデータを設定
	 *
	 * @param string|null $metadata 回数制限の種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 回数制限の種類のメタデータを設定
	 *
	 * @param string|null $metadata 回数制限の種類のメタデータ
	 * @return LimitModelMaster $this
	 */
	public function withMetadata(?string $metadata): LimitModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
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
	 * @return LimitModelMaster $this
	 */
	public function withResetType(?string $resetType): LimitModelMaster {
		$this->resetType = $resetType;
		return $this;
	}
	/**
     * @var int リセットをする日にち
	 */
	protected $resetDayOfMonth;

	/**
	 * リセットをする日にちを取得
	 *
	 * @return int|null リセットをする日にち
	 */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 * @return LimitModelMaster $this
	 */
	public function withResetDayOfMonth(?int $resetDayOfMonth): LimitModelMaster {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	/**
     * @var string リセットする曜日
	 */
	protected $resetDayOfWeek;

	/**
	 * リセットする曜日を取得
	 *
	 * @return string|null リセットする曜日
	 */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 * @return LimitModelMaster $this
	 */
	public function withResetDayOfWeek(?string $resetDayOfWeek): LimitModelMaster {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	/**
     * @var int リセット時刻
	 */
	protected $resetHour;

	/**
	 * リセット時刻を取得
	 *
	 * @return int|null リセット時刻
	 */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 * @return LimitModelMaster $this
	 */
	public function withResetHour(?int $resetHour): LimitModelMaster {
		$this->resetHour = $resetHour;
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
	 * @return LimitModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): LimitModelMaster {
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
	 * @return LimitModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): LimitModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "limitModelId" => $this->limitModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "resetType" => $this->resetType,
            "resetDayOfMonth" => $this->resetDayOfMonth,
            "resetDayOfWeek" => $this->resetDayOfWeek,
            "resetHour" => $this->resetHour,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): LimitModelMaster {
        $model = new LimitModelMaster();
        $model->setLimitModelId(isset($data["limitModelId"]) ? $data["limitModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setResetType(isset($data["resetType"]) ? $data["resetType"] : null);
        $model->setResetDayOfMonth(isset($data["resetDayOfMonth"]) ? $data["resetDayOfMonth"] : null);
        $model->setResetDayOfWeek(isset($data["resetDayOfWeek"]) ? $data["resetDayOfWeek"] : null);
        $model->setResetHour(isset($data["resetHour"]) ? $data["resetHour"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}