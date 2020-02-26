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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 経験値の種類マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateExperienceModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 経験値の種類マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateExperienceModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 経験値の種類名 */
    private $experienceName;

    /**
     * 経験値の種類名を取得
     *
     * @return string|null 経験値の種類マスターを更新
     */
    public function getExperienceName(): ?string {
        return $this->experienceName;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $experienceName 経験値の種類マスターを更新
     */
    public function setExperienceName(string $experienceName) {
        $this->experienceName = $experienceName;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $experienceName 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withExperienceName(string $experienceName): UpdateExperienceModelMasterRequest {
        $this->setExperienceName($experienceName);
        return $this;
    }

    /** @var string 経験値の種類マスターの説明 */
    private $description;

    /**
     * 経験値の種類マスターの説明を取得
     *
     * @return string|null 経験値の種類マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 経験値の種類マスターの説明を設定
     *
     * @param string $description 経験値の種類マスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 経験値の種類マスターの説明を設定
     *
     * @param string $description 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateExperienceModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 経験値の種類のメタデータ */
    private $metadata;

    /**
     * 経験値の種類のメタデータを取得
     *
     * @return string|null 経験値の種類マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 経験値の種類のメタデータを設定
     *
     * @param string $metadata 経験値の種類マスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 経験値の種類のメタデータを設定
     *
     * @param string $metadata 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateExperienceModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int 経験値の初期値 */
    private $defaultExperience;

    /**
     * 経験値の初期値を取得
     *
     * @return int|null 経験値の種類マスターを更新
     */
    public function getDefaultExperience(): ?int {
        return $this->defaultExperience;
    }

    /**
     * 経験値の初期値を設定
     *
     * @param int $defaultExperience 経験値の種類マスターを更新
     */
    public function setDefaultExperience(int $defaultExperience) {
        $this->defaultExperience = $defaultExperience;
    }

    /**
     * 経験値の初期値を設定
     *
     * @param int $defaultExperience 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withDefaultExperience(int $defaultExperience): UpdateExperienceModelMasterRequest {
        $this->setDefaultExperience($defaultExperience);
        return $this;
    }

    /** @var int ランクキャップの初期値 */
    private $defaultRankCap;

    /**
     * ランクキャップの初期値を取得
     *
     * @return int|null 経験値の種類マスターを更新
     */
    public function getDefaultRankCap(): ?int {
        return $this->defaultRankCap;
    }

    /**
     * ランクキャップの初期値を設定
     *
     * @param int $defaultRankCap 経験値の種類マスターを更新
     */
    public function setDefaultRankCap(int $defaultRankCap) {
        $this->defaultRankCap = $defaultRankCap;
    }

    /**
     * ランクキャップの初期値を設定
     *
     * @param int $defaultRankCap 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withDefaultRankCap(int $defaultRankCap): UpdateExperienceModelMasterRequest {
        $this->setDefaultRankCap($defaultRankCap);
        return $this;
    }

    /** @var int ランクキャップの最大値 */
    private $maxRankCap;

    /**
     * ランクキャップの最大値を取得
     *
     * @return int|null 経験値の種類マスターを更新
     */
    public function getMaxRankCap(): ?int {
        return $this->maxRankCap;
    }

    /**
     * ランクキャップの最大値を設定
     *
     * @param int $maxRankCap 経験値の種類マスターを更新
     */
    public function setMaxRankCap(int $maxRankCap) {
        $this->maxRankCap = $maxRankCap;
    }

    /**
     * ランクキャップの最大値を設定
     *
     * @param int $maxRankCap 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withMaxRankCap(int $maxRankCap): UpdateExperienceModelMasterRequest {
        $this->setMaxRankCap($maxRankCap);
        return $this;
    }

    /** @var string ランク計算に用いる */
    private $rankThresholdId;

    /**
     * ランク計算に用いるを取得
     *
     * @return string|null 経験値の種類マスターを更新
     */
    public function getRankThresholdId(): ?string {
        return $this->rankThresholdId;
    }

    /**
     * ランク計算に用いるを設定
     *
     * @param string $rankThresholdId 経験値の種類マスターを更新
     */
    public function setRankThresholdId(string $rankThresholdId) {
        $this->rankThresholdId = $rankThresholdId;
    }

    /**
     * ランク計算に用いるを設定
     *
     * @param string $rankThresholdId 経験値の種類マスターを更新
     * @return UpdateExperienceModelMasterRequest $this
     */
    public function withRankThresholdId(string $rankThresholdId): UpdateExperienceModelMasterRequest {
        $this->setRankThresholdId($rankThresholdId);
        return $this;
    }

}