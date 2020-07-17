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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;

/**
 * ランクアップ閾値マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class ThresholdMaster implements IModel {
	/**
     * @var string ランクアップ閾値マスター
	 */
	protected $thresholdId;

	/**
	 * ランクアップ閾値マスターを取得
	 *
	 * @return string|null ランクアップ閾値マスター
	 */
	public function getThresholdId(): ?string {
		return $this->thresholdId;
	}

	/**
	 * ランクアップ閾値マスターを設定
	 *
	 * @param string|null $thresholdId ランクアップ閾値マスター
	 */
	public function setThresholdId(?string $thresholdId) {
		$this->thresholdId = $thresholdId;
	}

	/**
	 * ランクアップ閾値マスターを設定
	 *
	 * @param string|null $thresholdId ランクアップ閾値マスター
	 * @return ThresholdMaster $this
	 */
	public function withThresholdId(?string $thresholdId): ThresholdMaster {
		$this->thresholdId = $thresholdId;
		return $this;
	}
	/**
     * @var string ランクアップ閾値名
	 */
	protected $name;

	/**
	 * ランクアップ閾値名を取得
	 *
	 * @return string|null ランクアップ閾値名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ランクアップ閾値名を設定
	 *
	 * @param string|null $name ランクアップ閾値名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ランクアップ閾値名を設定
	 *
	 * @param string|null $name ランクアップ閾値名
	 * @return ThresholdMaster $this
	 */
	public function withName(?string $name): ThresholdMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ランクアップ閾値マスターの説明
	 */
	protected $description;

	/**
	 * ランクアップ閾値マスターの説明を取得
	 *
	 * @return string|null ランクアップ閾値マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ランクアップ閾値マスターの説明を設定
	 *
	 * @param string|null $description ランクアップ閾値マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ランクアップ閾値マスターの説明を設定
	 *
	 * @param string|null $description ランクアップ閾値マスターの説明
	 * @return ThresholdMaster $this
	 */
	public function withDescription(?string $description): ThresholdMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string ランクアップ閾値のメタデータ
	 */
	protected $metadata;

	/**
	 * ランクアップ閾値のメタデータを取得
	 *
	 * @return string|null ランクアップ閾値のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * ランクアップ閾値のメタデータを設定
	 *
	 * @param string|null $metadata ランクアップ閾値のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * ランクアップ閾値のメタデータを設定
	 *
	 * @param string|null $metadata ランクアップ閾値のメタデータ
	 * @return ThresholdMaster $this
	 */
	public function withMetadata(?string $metadata): ThresholdMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int[] ランクアップ経験値閾値リスト
	 */
	protected $values;

	/**
	 * ランクアップ経験値閾値リストを取得
	 *
	 * @return int[]|null ランクアップ経験値閾値リスト
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * ランクアップ経験値閾値リストを設定
	 *
	 * @param int[]|null $values ランクアップ経験値閾値リスト
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * ランクアップ経験値閾値リストを設定
	 *
	 * @param int[]|null $values ランクアップ経験値閾値リスト
	 * @return ThresholdMaster $this
	 */
	public function withValues(?array $values): ThresholdMaster {
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
	 * @return ThresholdMaster $this
	 */
	public function withCreatedAt(?int $createdAt): ThresholdMaster {
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
	 * @return ThresholdMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): ThresholdMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "thresholdId" => $this->thresholdId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "values" => $this->values,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ThresholdMaster {
        $model = new ThresholdMaster();
        $model->setThresholdId(isset($data["thresholdId"]) ? $data["thresholdId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setValues(isset($data["values"]) ? $data["values"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}