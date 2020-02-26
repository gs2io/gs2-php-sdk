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
 * スタミナモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class StaminaModel implements IModel {
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
	 * @return StaminaModel $this
	 */
	public function withStaminaModelId(?string $staminaModelId): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withName(?string $name): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withMetadata(?string $metadata): StaminaModel {
		$this->metadata = $metadata;
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
	 * @return StaminaModel $this
	 */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withRecoverValue(?int $recoverValue): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withInitialCapacity(?int $initialCapacity): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withIsOverflow(?bool $isOverflow): StaminaModel {
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
	 * @return StaminaModel $this
	 */
	public function withMaxCapacity(?int $maxCapacity): StaminaModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	/**
     * @var MaxStaminaTable GS2-Experience と連携する際に使用するスタミナ最大値テーブル
	 */
	protected $maxStaminaTable;

	/**
	 * GS2-Experience と連携する際に使用するスタミナ最大値テーブルを取得
	 *
	 * @return MaxStaminaTable|null GS2-Experience と連携する際に使用するスタミナ最大値テーブル
	 */
	public function getMaxStaminaTable(): ?MaxStaminaTable {
		return $this->maxStaminaTable;
	}

	/**
	 * GS2-Experience と連携する際に使用するスタミナ最大値テーブルを設定
	 *
	 * @param MaxStaminaTable|null $maxStaminaTable GS2-Experience と連携する際に使用するスタミナ最大値テーブル
	 */
	public function setMaxStaminaTable(?MaxStaminaTable $maxStaminaTable) {
		$this->maxStaminaTable = $maxStaminaTable;
	}

	/**
	 * GS2-Experience と連携する際に使用するスタミナ最大値テーブルを設定
	 *
	 * @param MaxStaminaTable|null $maxStaminaTable GS2-Experience と連携する際に使用するスタミナ最大値テーブル
	 * @return StaminaModel $this
	 */
	public function withMaxStaminaTable(?MaxStaminaTable $maxStaminaTable): StaminaModel {
		$this->maxStaminaTable = $maxStaminaTable;
		return $this;
	}
	/**
     * @var RecoverIntervalTable GS2-Experience と連携する際に使用する回復間隔テーブル
	 */
	protected $recoverIntervalTable;

	/**
	 * GS2-Experience と連携する際に使用する回復間隔テーブルを取得
	 *
	 * @return RecoverIntervalTable|null GS2-Experience と連携する際に使用する回復間隔テーブル
	 */
	public function getRecoverIntervalTable(): ?RecoverIntervalTable {
		return $this->recoverIntervalTable;
	}

	/**
	 * GS2-Experience と連携する際に使用する回復間隔テーブルを設定
	 *
	 * @param RecoverIntervalTable|null $recoverIntervalTable GS2-Experience と連携する際に使用する回復間隔テーブル
	 */
	public function setRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable) {
		$this->recoverIntervalTable = $recoverIntervalTable;
	}

	/**
	 * GS2-Experience と連携する際に使用する回復間隔テーブルを設定
	 *
	 * @param RecoverIntervalTable|null $recoverIntervalTable GS2-Experience と連携する際に使用する回復間隔テーブル
	 * @return StaminaModel $this
	 */
	public function withRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable): StaminaModel {
		$this->recoverIntervalTable = $recoverIntervalTable;
		return $this;
	}
	/**
     * @var RecoverValueTable GS2-Experience と連携する際に使用する回復量テーブル
	 */
	protected $recoverValueTable;

	/**
	 * GS2-Experience と連携する際に使用する回復量テーブルを取得
	 *
	 * @return RecoverValueTable|null GS2-Experience と連携する際に使用する回復量テーブル
	 */
	public function getRecoverValueTable(): ?RecoverValueTable {
		return $this->recoverValueTable;
	}

	/**
	 * GS2-Experience と連携する際に使用する回復量テーブルを設定
	 *
	 * @param RecoverValueTable|null $recoverValueTable GS2-Experience と連携する際に使用する回復量テーブル
	 */
	public function setRecoverValueTable(?RecoverValueTable $recoverValueTable) {
		$this->recoverValueTable = $recoverValueTable;
	}

	/**
	 * GS2-Experience と連携する際に使用する回復量テーブルを設定
	 *
	 * @param RecoverValueTable|null $recoverValueTable GS2-Experience と連携する際に使用する回復量テーブル
	 * @return StaminaModel $this
	 */
	public function withRecoverValueTable(?RecoverValueTable $recoverValueTable): StaminaModel {
		$this->recoverValueTable = $recoverValueTable;
		return $this;
	}

    public function toJson(): array {
        return array(
            "staminaModelId" => $this->staminaModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "recoverIntervalMinutes" => $this->recoverIntervalMinutes,
            "recoverValue" => $this->recoverValue,
            "initialCapacity" => $this->initialCapacity,
            "isOverflow" => $this->isOverflow,
            "maxCapacity" => $this->maxCapacity,
            "maxStaminaTable" => $this->maxStaminaTable->toJson(),
            "recoverIntervalTable" => $this->recoverIntervalTable->toJson(),
            "recoverValueTable" => $this->recoverValueTable->toJson(),
        );
    }

    public static function fromJson(array $data): StaminaModel {
        $model = new StaminaModel();
        $model->setStaminaModelId(isset($data["staminaModelId"]) ? $data["staminaModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setRecoverIntervalMinutes(isset($data["recoverIntervalMinutes"]) ? $data["recoverIntervalMinutes"] : null);
        $model->setRecoverValue(isset($data["recoverValue"]) ? $data["recoverValue"] : null);
        $model->setInitialCapacity(isset($data["initialCapacity"]) ? $data["initialCapacity"] : null);
        $model->setIsOverflow(isset($data["isOverflow"]) ? $data["isOverflow"] : null);
        $model->setMaxCapacity(isset($data["maxCapacity"]) ? $data["maxCapacity"] : null);
        $model->setMaxStaminaTable(isset($data["maxStaminaTable"]) ? MaxStaminaTable::fromJson($data["maxStaminaTable"]) : null);
        $model->setRecoverIntervalTable(isset($data["recoverIntervalTable"]) ? RecoverIntervalTable::fromJson($data["recoverIntervalTable"]) : null);
        $model->setRecoverValueTable(isset($data["recoverValueTable"]) ? RecoverValueTable::fromJson($data["recoverValueTable"]) : null);
        return $model;
    }
}