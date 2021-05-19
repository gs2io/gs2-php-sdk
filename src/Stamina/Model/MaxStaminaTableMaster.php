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
 * スタミナの最大値テーブルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class MaxStaminaTableMaster implements IModel {
	/**
     * @var string スタミナの最大値テーブルマスター
	 */
	protected $maxStaminaTableId;

	/**
	 * スタミナの最大値テーブルマスターを取得
	 *
	 * @return string|null スタミナの最大値テーブルマスター
	 */
	public function getMaxStaminaTableId(): ?string {
		return $this->maxStaminaTableId;
	}

	/**
	 * スタミナの最大値テーブルマスターを設定
	 *
	 * @param string|null $maxStaminaTableId スタミナの最大値テーブルマスター
	 */
	public function setMaxStaminaTableId(?string $maxStaminaTableId) {
		$this->maxStaminaTableId = $maxStaminaTableId;
	}

	/**
	 * スタミナの最大値テーブルマスターを設定
	 *
	 * @param string|null $maxStaminaTableId スタミナの最大値テーブルマスター
	 * @return MaxStaminaTableMaster $this
	 */
	public function withMaxStaminaTableId(?string $maxStaminaTableId): MaxStaminaTableMaster {
		$this->maxStaminaTableId = $maxStaminaTableId;
		return $this;
	}
	/**
     * @var string 最大スタミナ値テーブル名
	 */
	protected $name;

	/**
	 * 最大スタミナ値テーブル名を取得
	 *
	 * @return string|null 最大スタミナ値テーブル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 最大スタミナ値テーブル名を設定
	 *
	 * @param string|null $name 最大スタミナ値テーブル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 最大スタミナ値テーブル名を設定
	 *
	 * @param string|null $name 最大スタミナ値テーブル名
	 * @return MaxStaminaTableMaster $this
	 */
	public function withName(?string $name): MaxStaminaTableMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 最大スタミナ値テーブルのメタデータ
	 */
	protected $metadata;

	/**
	 * 最大スタミナ値テーブルのメタデータを取得
	 *
	 * @return string|null 最大スタミナ値テーブルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 最大スタミナ値テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 最大スタミナ値テーブルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 最大スタミナ値テーブルのメタデータを設定
	 *
	 * @param string|null $metadata 最大スタミナ値テーブルのメタデータ
	 * @return MaxStaminaTableMaster $this
	 */
	public function withMetadata(?string $metadata): MaxStaminaTableMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string スタミナの最大値テーブルマスターの説明
	 */
	protected $description;

	/**
	 * スタミナの最大値テーブルマスターの説明を取得
	 *
	 * @return string|null スタミナの最大値テーブルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * スタミナの最大値テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナの最大値テーブルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * スタミナの最大値テーブルマスターの説明を設定
	 *
	 * @param string|null $description スタミナの最大値テーブルマスターの説明
	 * @return MaxStaminaTableMaster $this
	 */
	public function withDescription(?string $description): MaxStaminaTableMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 経験値の種類マスター のGRN
	 */
	protected $experienceModelId;

	/**
	 * 経験値の種類マスター のGRNを取得
	 *
	 * @return string|null 経験値の種類マスター のGRN
	 */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	/**
	 * 経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター のGRN
	 */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	/**
	 * 経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター のGRN
	 * @return MaxStaminaTableMaster $this
	 */
	public function withExperienceModelId(?string $experienceModelId): MaxStaminaTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	/**
     * @var int[] ランク毎のスタミナの最大値テーブル
	 */
	protected $values;

	/**
	 * ランク毎のスタミナの最大値テーブルを取得
	 *
	 * @return int[]|null ランク毎のスタミナの最大値テーブル
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * ランク毎のスタミナの最大値テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナの最大値テーブル
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * ランク毎のスタミナの最大値テーブルを設定
	 *
	 * @param int[]|null $values ランク毎のスタミナの最大値テーブル
	 * @return MaxStaminaTableMaster $this
	 */
	public function withValues(?array $values): MaxStaminaTableMaster {
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
	 * @return MaxStaminaTableMaster $this
	 */
	public function withCreatedAt(?int $createdAt): MaxStaminaTableMaster {
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
	 * @return MaxStaminaTableMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): MaxStaminaTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "maxStaminaTableId" => $this->maxStaminaTableId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "experienceModelId" => $this->experienceModelId,
            "values" => $this->values,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): MaxStaminaTableMaster {
        $model = new MaxStaminaTableMaster();
        $model->setMaxStaminaTableId(isset($data["maxStaminaTableId"]) ? $data["maxStaminaTableId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setValues(isset($data["values"]) ? $data["values"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}