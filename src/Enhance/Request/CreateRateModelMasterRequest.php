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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\BonusRate;

/**
 * 強化レートマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateRateModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化レートマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateRateModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 強化レート名 */
    private $name;

    /**
     * 強化レート名を取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $name 強化レートマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $name 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withName(string $name = null): CreateRateModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 強化レートマスターの説明 */
    private $description;

    /**
     * 強化レートマスターの説明を取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 強化レートマスターの説明を設定
     *
     * @param string $description 強化レートマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 強化レートマスターの説明を設定
     *
     * @param string $description 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateRateModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 強化レートのメタデータ */
    private $metadata;

    /**
     * 強化レートのメタデータを取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 強化レートのメタデータを設定
     *
     * @param string $metadata 強化レートマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 強化レートのメタデータを設定
     *
     * @param string $metadata 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateRateModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 強化対象に使用できるインベントリモデル のGRN */
    private $targetInventoryModelId;

    /**
     * 強化対象に使用できるインベントリモデル のGRNを取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getTargetInventoryModelId(): ?string {
        return $this->targetInventoryModelId;
    }

    /**
     * 強化対象に使用できるインベントリモデル のGRNを設定
     *
     * @param string $targetInventoryModelId 強化レートマスターを新規作成
     */
    public function setTargetInventoryModelId(string $targetInventoryModelId = null) {
        $this->targetInventoryModelId = $targetInventoryModelId;
    }

    /**
     * 強化対象に使用できるインベントリモデル のGRNを設定
     *
     * @param string $targetInventoryModelId 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withTargetInventoryModelId(string $targetInventoryModelId = null): CreateRateModelMasterRequest {
        $this->setTargetInventoryModelId($targetInventoryModelId);
        return $this;
    }

    /** @var string GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックス */
    private $acquireExperienceSuffix;

    /**
     * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getAcquireExperienceSuffix(): ?string {
        return $this->acquireExperienceSuffix;
    }

    /**
     * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを設定
     *
     * @param string $acquireExperienceSuffix 強化レートマスターを新規作成
     */
    public function setAcquireExperienceSuffix(string $acquireExperienceSuffix = null) {
        $this->acquireExperienceSuffix = $acquireExperienceSuffix;
    }

    /**
     * GS2-Experience で入手した経験値を格納する プロパティID に付与するサフィックスを設定
     *
     * @param string $acquireExperienceSuffix 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withAcquireExperienceSuffix(string $acquireExperienceSuffix = null): CreateRateModelMasterRequest {
        $this->setAcquireExperienceSuffix($acquireExperienceSuffix);
        return $this;
    }

    /** @var string 強化素材に使用できるインベントリモデル のGRN */
    private $materialInventoryModelId;

    /**
     * 強化素材に使用できるインベントリモデル のGRNを取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getMaterialInventoryModelId(): ?string {
        return $this->materialInventoryModelId;
    }

    /**
     * 強化素材に使用できるインベントリモデル のGRNを設定
     *
     * @param string $materialInventoryModelId 強化レートマスターを新規作成
     */
    public function setMaterialInventoryModelId(string $materialInventoryModelId = null) {
        $this->materialInventoryModelId = $materialInventoryModelId;
    }

    /**
     * 強化素材に使用できるインベントリモデル のGRNを設定
     *
     * @param string $materialInventoryModelId 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withMaterialInventoryModelId(string $materialInventoryModelId = null): CreateRateModelMasterRequest {
        $this->setMaterialInventoryModelId($materialInventoryModelId);
        return $this;
    }

    /** @var string[] 入手経験値を格納しているメタデータのJSON階層 */
    private $acquireExperienceHierarchy;

    /**
     * 入手経験値を格納しているメタデータのJSON階層を取得
     *
     * @return string[]|null 強化レートマスターを新規作成
     */
    public function getAcquireExperienceHierarchy(): ?array {
        return $this->acquireExperienceHierarchy;
    }

    /**
     * 入手経験値を格納しているメタデータのJSON階層を設定
     *
     * @param string[] $acquireExperienceHierarchy 強化レートマスターを新規作成
     */
    public function setAcquireExperienceHierarchy(array $acquireExperienceHierarchy = null) {
        $this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
    }

    /**
     * 入手経験値を格納しているメタデータのJSON階層を設定
     *
     * @param string[] $acquireExperienceHierarchy 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withAcquireExperienceHierarchy(array $acquireExperienceHierarchy = null): CreateRateModelMasterRequest {
        $this->setAcquireExperienceHierarchy($acquireExperienceHierarchy);
        return $this;
    }

    /** @var string 獲得できる経験値の種類マスター のGRN */
    private $experienceModelId;

    /**
     * 獲得できる経験値の種類マスター のGRNを取得
     *
     * @return string|null 強化レートマスターを新規作成
     */
    public function getExperienceModelId(): ?string {
        return $this->experienceModelId;
    }

    /**
     * 獲得できる経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId 強化レートマスターを新規作成
     */
    public function setExperienceModelId(string $experienceModelId = null) {
        $this->experienceModelId = $experienceModelId;
    }

    /**
     * 獲得できる経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withExperienceModelId(string $experienceModelId = null): CreateRateModelMasterRequest {
        $this->setExperienceModelId($experienceModelId);
        return $this;
    }

    /** @var BonusRate[] 経験値獲得量ボーナス */
    private $bonusRates;

    /**
     * 経験値獲得量ボーナスを取得
     *
     * @return BonusRate[]|null 強化レートマスターを新規作成
     */
    public function getBonusRates(): ?array {
        return $this->bonusRates;
    }

    /**
     * 経験値獲得量ボーナスを設定
     *
     * @param BonusRate[] $bonusRates 強化レートマスターを新規作成
     */
    public function setBonusRates(array $bonusRates = null) {
        $this->bonusRates = $bonusRates;
    }

    /**
     * 経験値獲得量ボーナスを設定
     *
     * @param BonusRate[] $bonusRates 強化レートマスターを新規作成
     * @return CreateRateModelMasterRequest $this
     */
    public function withBonusRates(array $bonusRates = null): CreateRateModelMasterRequest {
        $this->setBonusRates($bonusRates);
        return $this;
    }

}