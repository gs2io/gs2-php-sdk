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
 * 経験値の種類マスター
 *
 * @author Game Server Services, Inc.
 *
 */
class ExperienceModelMaster implements IModel {
	/**
     * @var string 経験値の種類マスター
	 */
	protected $experienceModelId;

	/**
	 * 経験値の種類マスターを取得
	 *
	 * @return string|null 経験値の種類マスター
	 */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	/**
	 * 経験値の種類マスターを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター
	 */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	/**
	 * 経験値の種類マスターを設定
	 *
	 * @param string|null $experienceModelId 経験値の種類マスター
	 * @return ExperienceModelMaster $this
	 */
	public function withExperienceModelId(?string $experienceModelId): ExperienceModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	/**
     * @var string 経験値の種類名
	 */
	protected $name;

	/**
	 * 経験値の種類名を取得
	 *
	 * @return string|null 経験値の種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 経験値の種類名を設定
	 *
	 * @param string|null $name 経験値の種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 経験値の種類名を設定
	 *
	 * @param string|null $name 経験値の種類名
	 * @return ExperienceModelMaster $this
	 */
	public function withName(?string $name): ExperienceModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 経験値の種類マスターの説明
	 */
	protected $description;

	/**
	 * 経験値の種類マスターの説明を取得
	 *
	 * @return string|null 経験値の種類マスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 経験値の種類マスターの説明を設定
	 *
	 * @param string|null $description 経験値の種類マスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 経験値の種類マスターの説明を設定
	 *
	 * @param string|null $description 経験値の種類マスターの説明
	 * @return ExperienceModelMaster $this
	 */
	public function withDescription(?string $description): ExperienceModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 経験値の種類のメタデータ
	 */
	protected $metadata;

	/**
	 * 経験値の種類のメタデータを取得
	 *
	 * @return string|null 経験値の種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 経験値の種類のメタデータを設定
	 *
	 * @param string|null $metadata 経験値の種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 経験値の種類のメタデータを設定
	 *
	 * @param string|null $metadata 経験値の種類のメタデータ
	 * @return ExperienceModelMaster $this
	 */
	public function withMetadata(?string $metadata): ExperienceModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int 経験値の初期値
	 */
	protected $defaultExperience;

	/**
	 * 経験値の初期値を取得
	 *
	 * @return int|null 経験値の初期値
	 */
	public function getDefaultExperience(): ?int {
		return $this->defaultExperience;
	}

	/**
	 * 経験値の初期値を設定
	 *
	 * @param int|null $defaultExperience 経験値の初期値
	 */
	public function setDefaultExperience(?int $defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	/**
	 * 経験値の初期値を設定
	 *
	 * @param int|null $defaultExperience 経験値の初期値
	 * @return ExperienceModelMaster $this
	 */
	public function withDefaultExperience(?int $defaultExperience): ExperienceModelMaster {
		$this->defaultExperience = $defaultExperience;
		return $this;
	}
	/**
     * @var int ランクキャップの初期値
	 */
	protected $defaultRankCap;

	/**
	 * ランクキャップの初期値を取得
	 *
	 * @return int|null ランクキャップの初期値
	 */
	public function getDefaultRankCap(): ?int {
		return $this->defaultRankCap;
	}

	/**
	 * ランクキャップの初期値を設定
	 *
	 * @param int|null $defaultRankCap ランクキャップの初期値
	 */
	public function setDefaultRankCap(?int $defaultRankCap) {
		$this->defaultRankCap = $defaultRankCap;
	}

	/**
	 * ランクキャップの初期値を設定
	 *
	 * @param int|null $defaultRankCap ランクキャップの初期値
	 * @return ExperienceModelMaster $this
	 */
	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModelMaster {
		$this->defaultRankCap = $defaultRankCap;
		return $this;
	}
	/**
     * @var int ランクキャップの最大値
	 */
	protected $maxRankCap;

	/**
	 * ランクキャップの最大値を取得
	 *
	 * @return int|null ランクキャップの最大値
	 */
	public function getMaxRankCap(): ?int {
		return $this->maxRankCap;
	}

	/**
	 * ランクキャップの最大値を設定
	 *
	 * @param int|null $maxRankCap ランクキャップの最大値
	 */
	public function setMaxRankCap(?int $maxRankCap) {
		$this->maxRankCap = $maxRankCap;
	}

	/**
	 * ランクキャップの最大値を設定
	 *
	 * @param int|null $maxRankCap ランクキャップの最大値
	 * @return ExperienceModelMaster $this
	 */
	public function withMaxRankCap(?int $maxRankCap): ExperienceModelMaster {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}
	/**
     * @var string ランク計算に用いる
	 */
	protected $rankThresholdId;

	/**
	 * ランク計算に用いるを取得
	 *
	 * @return string|null ランク計算に用いる
	 */
	public function getRankThresholdId(): ?string {
		return $this->rankThresholdId;
	}

	/**
	 * ランク計算に用いるを設定
	 *
	 * @param string|null $rankThresholdId ランク計算に用いる
	 */
	public function setRankThresholdId(?string $rankThresholdId) {
		$this->rankThresholdId = $rankThresholdId;
	}

	/**
	 * ランク計算に用いるを設定
	 *
	 * @param string|null $rankThresholdId ランク計算に用いる
	 * @return ExperienceModelMaster $this
	 */
	public function withRankThresholdId(?string $rankThresholdId): ExperienceModelMaster {
		$this->rankThresholdId = $rankThresholdId;
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
	 * @return ExperienceModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): ExperienceModelMaster {
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
	 * @return ExperienceModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): ExperienceModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "experienceModelId" => $this->experienceModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "defaultExperience" => $this->defaultExperience,
            "defaultRankCap" => $this->defaultRankCap,
            "maxRankCap" => $this->maxRankCap,
            "rankThresholdId" => $this->rankThresholdId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ExperienceModelMaster {
        $model = new ExperienceModelMaster();
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDefaultExperience(isset($data["defaultExperience"]) ? $data["defaultExperience"] : null);
        $model->setDefaultRankCap(isset($data["defaultRankCap"]) ? $data["defaultRankCap"] : null);
        $model->setMaxRankCap(isset($data["maxRankCap"]) ? $data["maxRankCap"] : null);
        $model->setRankThresholdId(isset($data["rankThresholdId"]) ? $data["rankThresholdId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}