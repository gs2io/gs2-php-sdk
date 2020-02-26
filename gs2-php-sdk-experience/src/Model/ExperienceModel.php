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
 * 経験値・ランクアップ閾値モデル
 *
 * @author Game Server Services, Inc.
 *
 */
class ExperienceModel implements IModel {
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
	 * @return ExperienceModel $this
	 */
	public function withExperienceModelId(?string $experienceModelId): ExperienceModel {
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
	 * @return ExperienceModel $this
	 */
	public function withName(?string $name): ExperienceModel {
		$this->name = $name;
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
	 * @return ExperienceModel $this
	 */
	public function withMetadata(?string $metadata): ExperienceModel {
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
	 * @return ExperienceModel $this
	 */
	public function withDefaultExperience(?int $defaultExperience): ExperienceModel {
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
	 * @return ExperienceModel $this
	 */
	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModel {
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
	 * @return ExperienceModel $this
	 */
	public function withMaxRankCap(?int $maxRankCap): ExperienceModel {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}
	/**
     * @var Threshold ランクアップ閾値
	 */
	protected $rankThreshold;

	/**
	 * ランクアップ閾値を取得
	 *
	 * @return Threshold|null ランクアップ閾値
	 */
	public function getRankThreshold(): ?Threshold {
		return $this->rankThreshold;
	}

	/**
	 * ランクアップ閾値を設定
	 *
	 * @param Threshold|null $rankThreshold ランクアップ閾値
	 */
	public function setRankThreshold(?Threshold $rankThreshold) {
		$this->rankThreshold = $rankThreshold;
	}

	/**
	 * ランクアップ閾値を設定
	 *
	 * @param Threshold|null $rankThreshold ランクアップ閾値
	 * @return ExperienceModel $this
	 */
	public function withRankThreshold(?Threshold $rankThreshold): ExperienceModel {
		$this->rankThreshold = $rankThreshold;
		return $this;
	}

    public function toJson(): array {
        return array(
            "experienceModelId" => $this->experienceModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "defaultExperience" => $this->defaultExperience,
            "defaultRankCap" => $this->defaultRankCap,
            "maxRankCap" => $this->maxRankCap,
            "rankThreshold" => $this->rankThreshold->toJson(),
        );
    }

    public static function fromJson(array $data): ExperienceModel {
        $model = new ExperienceModel();
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDefaultExperience(isset($data["defaultExperience"]) ? $data["defaultExperience"] : null);
        $model->setDefaultRankCap(isset($data["defaultRankCap"]) ? $data["defaultRankCap"] : null);
        $model->setMaxRankCap(isset($data["maxRankCap"]) ? $data["maxRankCap"] : null);
        $model->setRankThreshold(isset($data["rankThreshold"]) ? Threshold::fromJson($data["rankThreshold"]) : null);
        return $model;
    }
}