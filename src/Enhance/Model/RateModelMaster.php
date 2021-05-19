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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;

/**
 * 強化レートマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class RateModelMaster implements IModel {
	/**
     * @var string 強化レートマスター
	 */
	protected $rateModelId;

	/**
	 * 強化レートマスターを取得
	 *
	 * @return string|null 強化レートマスター
	 */
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}

	/**
	 * 強化レートマスターを設定
	 *
	 * @param string|null $rateModelId 強化レートマスター
	 */
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}

	/**
	 * 強化レートマスターを設定
	 *
	 * @param string|null $rateModelId 強化レートマスター
	 * @return RateModelMaster $this
	 */
	public function withRateModelId(?string $rateModelId): RateModelMaster {
		$this->rateModelId = $rateModelId;
		return $this;
	}
	/**
     * @var string 強化レート名
	 */
	protected $name;

	/**
	 * 強化レート名を取得
	 *
	 * @return string|null 強化レート名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 強化レート名を設定
	 *
	 * @param string|null $name 強化レート名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 強化レート名を設定
	 *
	 * @param string|null $name 強化レート名
	 * @return RateModelMaster $this
	 */
	public function withName(?string $name): RateModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 強化レートマスターの説明
	 */
	protected $description;

	/**
	 * 強化レートマスターの説明を取得
	 *
	 * @return string|null 強化レートマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 強化レートマスターの説明を設定
	 *
	 * @param string|null $description 強化レートマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 強化レートマスターの説明を設定
	 *
	 * @param string|null $description 強化レートマスターの説明
	 * @return RateModelMaster $this
	 */
	public function withDescription(?string $description): RateModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 強化レートのメタデータ
	 */
	protected $metadata;

	/**
	 * 強化レートのメタデータを取得
	 *
	 * @return string|null 強化レートのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * 強化レートのメタデータを設定
	 *
	 * @param string|null $metadata 強化レートのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * 強化レートのメタデータを設定
	 *
	 * @param string|null $metadata 強化レートのメタデータ
	 * @return RateModelMaster $this
	 */
	public function withMetadata(?string $metadata): RateModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string 強化対象に使用できるインベントリモデル のGRN
	 */
	protected $targetInventoryModelId;

	/**
	 * 強化対象に使用できるインベントリモデル のGRNを取得
	 *
	 * @return string|null 強化対象に使用できるインベントリモデル のGRN
	 */
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}

	/**
	 * 強化対象に使用できるインベントリモデル のGRNを設定
	 *
	 * @param string|null $targetInventoryModelId 強化対象に使用できるインベントリモデル のGRN
	 */
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}

	/**
	 * 強化対象に使用できるインベントリモデル のGRNを設定
	 *
	 * @param string|null $targetInventoryModelId 強化対象に使用できるインベントリモデル のGRN
	 * @return RateModelMaster $this
	 */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): RateModelMaster {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	/**
     * @var string GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックス
	 */
	protected $acquireExperienceSuffix;

	/**
	 * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを取得
	 *
	 * @return string|null GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックス
	 */
	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}

	/**
	 * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを設定
	 *
	 * @param string|null $acquireExperienceSuffix GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックス
	 */
	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}

	/**
	 * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを設定
	 *
	 * @param string|null $acquireExperienceSuffix GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックス
	 * @return RateModelMaster $this
	 */
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): RateModelMaster {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}
	/**
     * @var string 強化素材に使用できるインベントリモデル のGRN
	 */
	protected $materialInventoryModelId;

	/**
	 * 強化素材に使用できるインベントリモデル のGRNを取得
	 *
	 * @return string|null 強化素材に使用できるインベントリモデル のGRN
	 */
	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}

	/**
	 * 強化素材に使用できるインベントリモデル のGRNを設定
	 *
	 * @param string|null $materialInventoryModelId 強化素材に使用できるインベントリモデル のGRN
	 */
	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}

	/**
	 * 強化素材に使用できるインベントリモデル のGRNを設定
	 *
	 * @param string|null $materialInventoryModelId 強化素材に使用できるインベントリモデル のGRN
	 * @return RateModelMaster $this
	 */
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): RateModelMaster {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}
	/**
     * @var string[] 入手経験値を格納しているメタデータのJSON階層
	 */
	protected $acquireExperienceHierarchy;

	/**
	 * 入手経験値を格納しているメタデータのJSON階層を取得
	 *
	 * @return string[]|null 入手経験値を格納しているメタデータのJSON階層
	 */
	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}

	/**
	 * 入手経験値を格納しているメタデータのJSON階層を設定
	 *
	 * @param string[]|null $acquireExperienceHierarchy 入手経験値を格納しているメタデータのJSON階層
	 */
	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}

	/**
	 * 入手経験値を格納しているメタデータのJSON階層を設定
	 *
	 * @param string[]|null $acquireExperienceHierarchy 入手経験値を格納しているメタデータのJSON階層
	 * @return RateModelMaster $this
	 */
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): RateModelMaster {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}
	/**
     * @var string 獲得できる経験値の種類マスター のGRN
	 */
	protected $experienceModelId;

	/**
	 * 獲得できる経験値の種類マスター のGRNを取得
	 *
	 * @return string|null 獲得できる経験値の種類マスター のGRN
	 */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	/**
	 * 獲得できる経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 獲得できる経験値の種類マスター のGRN
	 */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	/**
	 * 獲得できる経験値の種類マスター のGRNを設定
	 *
	 * @param string|null $experienceModelId 獲得できる経験値の種類マスター のGRN
	 * @return RateModelMaster $this
	 */
	public function withExperienceModelId(?string $experienceModelId): RateModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	/**
     * @var BonusRate[] 経験値獲得量ボーナス
	 */
	protected $bonusRates;

	/**
	 * 経験値獲得量ボーナスを取得
	 *
	 * @return BonusRate[]|null 経験値獲得量ボーナス
	 */
	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}

	/**
	 * 経験値獲得量ボーナスを設定
	 *
	 * @param BonusRate[]|null $bonusRates 経験値獲得量ボーナス
	 */
	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}

	/**
	 * 経験値獲得量ボーナスを設定
	 *
	 * @param BonusRate[]|null $bonusRates 経験値獲得量ボーナス
	 * @return RateModelMaster $this
	 */
	public function withBonusRates(?array $bonusRates): RateModelMaster {
		$this->bonusRates = $bonusRates;
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
	 * @return RateModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): RateModelMaster {
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
	 * @return RateModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): RateModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "rateModelId" => $this->rateModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "targetInventoryModelId" => $this->targetInventoryModelId,
            "acquireExperienceSuffix" => $this->acquireExperienceSuffix,
            "materialInventoryModelId" => $this->materialInventoryModelId,
            "acquireExperienceHierarchy" => $this->acquireExperienceHierarchy,
            "experienceModelId" => $this->experienceModelId,
            "bonusRates" => array_map(
                function (BonusRate $v) {
                    return $v->toJson();
                },
                $this->bonusRates == null ? [] : $this->bonusRates
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): RateModelMaster {
        $model = new RateModelMaster();
        $model->setRateModelId(isset($data["rateModelId"]) ? $data["rateModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setTargetInventoryModelId(isset($data["targetInventoryModelId"]) ? $data["targetInventoryModelId"] : null);
        $model->setAcquireExperienceSuffix(isset($data["acquireExperienceSuffix"]) ? $data["acquireExperienceSuffix"] : null);
        $model->setMaterialInventoryModelId(isset($data["materialInventoryModelId"]) ? $data["materialInventoryModelId"] : null);
        $model->setAcquireExperienceHierarchy(isset($data["acquireExperienceHierarchy"]) ? $data["acquireExperienceHierarchy"] : null);
        $model->setExperienceModelId(isset($data["experienceModelId"]) ? $data["experienceModelId"] : null);
        $model->setBonusRates(array_map(
                function ($v) {
                    return BonusRate::fromJson($v);
                },
                isset($data["bonusRates"]) ? $data["bonusRates"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}