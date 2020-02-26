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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;

/**
 * スタミナモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class StaminaModelMaster implements IModel {
	/**
     * @var string スタミナモデルマスター
	 */
	protected $staminaModelId;

	/**
	 * スタミナモデルマスターを取得
	 *
	 * @return string|null スタミナモデルマスター
	 */
	public function getStaminaModelId(): ?string {
		return $this->staminaModelId;
	}

	/**
	 * スタミナモデルマスターを設定
	 *
	 * @param string|null $staminaModelId スタミナモデルマスター
	 */
	public function setStaminaModelId(?string $staminaModelId) {
		$this->staminaModelId = $staminaModelId;
	}

	/**
	 * スタミナモデルマスターを設定
	 *
	 * @param string|null $staminaModelId スタミナモデルマスター
	 * @return StaminaModelMaster $this
	 */
	public function withStaminaModelId(?string $staminaModelId): StaminaModelMaster {
		$this->staminaModelId = $staminaModelId;
		return $this;
	}
	/**
     * @var string スタミナの種類名
	 */
	protected $name;

	/**
	 * スタミナの種類名を取得
	 *
	 * @return string|null スタミナの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スタミナの種類名を設定
	 *
	 * @param string|null $name スタミナの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スタミナの種類名を設定
	 *
	 * @param string|null $name スタミナの種類名
	 * @return StaminaModelMaster $this
	 */
	public function withName(?string $name): StaminaModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string スタミナの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * スタミナの種類のメタデータを取得
	 *
	 * @return string|null スタミナの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * スタミナの種類のメタデータを設定
	 *
	 * @param string|null $metadata スタミナの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * スタミナの種類のメタデータを設定
	 *
	 * @param string|null $metadata スタミナの種類のメタデータ
	 * @return StaminaModelMaster $this
	 */
	public function withMetadata(?string $metadata): StaminaModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string スタミナモデルマスターの説明
	 */
	protected $description;

	/**
	 * スタミナモデルマスターの説明を取得
	 *
	 * @return string|null スタミナモデルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * スタミナモデルマスターの説明を設定
	 *
	 * @param string|null $description スタミナモデルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * スタミナモデルマスターの説明を設定
	 *
	 * @param string|null $description スタミナモデルマスターの説明
	 * @return StaminaModelMaster $this
	 */
	public function withDescription(?string $description): StaminaModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var int スタミナを回復する速度(分)
	 */
	protected $recoverIntervalMinutes;

	/**
	 * スタミナを回復する速度(分)を取得
	 *
	 * @return int|null スタミナを回復する速度(分)
	 */
	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	/**
	 * スタミナを回復する速度(分)を設定
	 *
	 * @param int|null $recoverIntervalMinutes スタミナを回復する速度(分)
	 */
	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	/**
	 * スタミナを回復する速度(分)を設定
	 *
	 * @param int|null $recoverIntervalMinutes スタミナを回復する速度(分)
	 * @return StaminaModelMaster $this
	 */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModelMaster {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}
	/**
     * @var int 時間経過後に回復する量
	 */
	protected $recoverValue;

	/**
	 * 時間経過後に回復する量を取得
	 *
	 * @return int|null 時間経過後に回復する量
	 */
	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	/**
	 * 時間経過後に回復する量を設定
	 *
	 * @param int|null $recoverValue 時間経過後に回復する量
	 */
	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	/**
	 * 時間経過後に回復する量を設定
	 *
	 * @param int|null $recoverValue 時間経過後に回復する量
	 * @return StaminaModelMaster $this
	 */
	public function withRecoverValue(?int $recoverValue): StaminaModelMaster {
		$this->recoverValue = $recoverValue;
		return $this;
	}
	/**
     * @var int スタミナの最大値の初期値
	 */
	protected $initialCapacity;

	/**
	 * スタミナの最大値の初期値を取得
	 *
	 * @return int|null スタミナの最大値の初期値
	 */
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	/**
	 * スタミナの最大値の初期値を設定
	 *
	 * @param int|null $initialCapacity スタミナの最大値の初期値
	 */
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	/**
	 * スタミナの最大値の初期値を設定
	 *
	 * @param int|null $initialCapacity スタミナの最大値の初期値
	 * @return StaminaModelMaster $this
	 */
	public function withInitialCapacity(?int $initialCapacity): StaminaModelMaster {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
	/**
     * @var bool 最大値を超えて回復するか
	 */
	protected $isOverflow;

	/**
	 * 最大値を超えて回復するかを取得
	 *
	 * @return bool|null 最大値を超えて回復するか
	 */
	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}

	/**
	 * 最大値を超えて回復するかを設定
	 *
	 * @param bool|null $isOverflow 最大値を超えて回復するか
	 */
	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}

	/**
	 * 最大値を超えて回復するかを設定
	 *
	 * @param bool|null $isOverflow 最大値を超えて回復するか
	 * @return StaminaModelMaster $this
	 */
	public function withIsOverflow(?bool $isOverflow): StaminaModelMaster {
		$this->isOverflow = $isOverflow;
		return $this;
	}
	/**
     * @var int 溢れた状況での最大値
	 */
	protected $maxCapacity;

	/**
	 * 溢れた状況での最大値を取得
	 *
	 * @return int|null 溢れた状況での最大値
	 */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	/**
	 * 溢れた状況での最大値を設定
	 *
	 * @param int|null $maxCapacity 溢れた状況での最大値
	 */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	/**
	 * 溢れた状況での最大値を設定
	 *
	 * @param int|null $maxCapacity 溢れた状況での最大値
	 * @return StaminaModelMaster $this
	 */
	public function withMaxCapacity(?int $maxCapacity): StaminaModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	/**
     * @var string GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名
	 */
	protected $maxStaminaTableName;

	/**
	 * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を取得
	 *
	 * @return string|null GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名
	 */
	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}

	/**
	 * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を設定
	 *
	 * @param string|null $maxStaminaTableName GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名
	 */
	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}

	/**
	 * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を設定
	 *
	 * @param string|null $maxStaminaTableName GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名
	 * @return StaminaModelMaster $this
	 */
	public function withMaxStaminaTableName(?string $maxStaminaTableName): StaminaModelMaster {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}
	/**
     * @var string GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名
	 */
	protected $recoverIntervalTableName;

	/**
	 * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を取得
	 *
	 * @return string|null GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名
	 */
	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}

	/**
	 * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を設定
	 *
	 * @param string|null $recoverIntervalTableName GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名
	 */
	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}

	/**
	 * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を設定
	 *
	 * @param string|null $recoverIntervalTableName GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名
	 * @return StaminaModelMaster $this
	 */
	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): StaminaModelMaster {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}
	/**
     * @var string GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名
	 */
	protected $recoverValueTableName;

	/**
	 * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を取得
	 *
	 * @return string|null GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名
	 */
	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}

	/**
	 * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を設定
	 *
	 * @param string|null $recoverValueTableName GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名
	 */
	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}

	/**
	 * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を設定
	 *
	 * @param string|null $recoverValueTableName GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名
	 * @return StaminaModelMaster $this
	 */
	public function withRecoverValueTableName(?string $recoverValueTableName): StaminaModelMaster {
		$this->recoverValueTableName = $recoverValueTableName;
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
	 * @return StaminaModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): StaminaModelMaster {
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
	 * @return StaminaModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): StaminaModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "staminaModelId" => $this->staminaModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "recoverIntervalMinutes" => $this->recoverIntervalMinutes,
            "recoverValue" => $this->recoverValue,
            "initialCapacity" => $this->initialCapacity,
            "isOverflow" => $this->isOverflow,
            "maxCapacity" => $this->maxCapacity,
            "maxStaminaTableName" => $this->maxStaminaTableName,
            "recoverIntervalTableName" => $this->recoverIntervalTableName,
            "recoverValueTableName" => $this->recoverValueTableName,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): StaminaModelMaster {
        $model = new StaminaModelMaster();
        $model->setStaminaModelId(isset($data["staminaModelId"]) ? $data["staminaModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setRecoverIntervalMinutes(isset($data["recoverIntervalMinutes"]) ? $data["recoverIntervalMinutes"] : null);
        $model->setRecoverValue(isset($data["recoverValue"]) ? $data["recoverValue"] : null);
        $model->setInitialCapacity(isset($data["initialCapacity"]) ? $data["initialCapacity"] : null);
        $model->setIsOverflow(isset($data["isOverflow"]) ? $data["isOverflow"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        $model->setMaxStaminaTableName(isset($data["maxStaminaTableName"]) ? $data["maxStaminaTableName"] : null);
        $model->setRecoverIntervalTableName(isset($data["recoverIntervalTableName"]) ? $data["recoverIntervalTableName"] : null);
        $model->setRecoverValueTableName(isset($data["recoverValueTableName"]) ? $data["recoverValueTableName"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}