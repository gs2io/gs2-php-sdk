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
 * 経験値の種類マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateExperienceModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 経験値の種類マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateExperienceModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 経験値の種類名 */
    private $name;

    /**
     * 経験値の種類名を取得
     *
     * @return string|null 経験値の種類マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $name 経験値の種類マスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $name 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withName(string $name): CreateExperienceModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 経験値の種類マスターの説明 */
    private $description;

    /**
     * 経験値の種類マスターの説明を取得
     *
     * @return string|null 経験値の種類マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 経験値の種類マスターの説明を設定
     *
     * @param string $description 経験値の種類マスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 経験値の種類マスターの説明を設定
     *
     * @param string $description 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withDescription(string $description): CreateExperienceModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 経験値の種類のメタデータ */
    private $metadata;

    /**
     * 経験値の種類のメタデータを取得
     *
     * @return string|null 経験値の種類マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 経験値の種類のメタデータを設定
     *
     * @param string $metadata 経験値の種類マスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 経験値の種類のメタデータを設定
     *
     * @param string $metadata 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateExperienceModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int 経験値の初期値 */
    private $defaultExperience;

    /**
     * 経験値の初期値を取得
     *
     * @return int|null 経験値の種類マスターを新規作成
     */
    public function getDefaultExperience(): ?int {
        return $this->defaultExperience;
    }

    /**
     * 経験値の初期値を設定
     *
     * @param int $defaultExperience 経験値の種類マスターを新規作成
     */
    public function setDefaultExperience(int $defaultExperience) {
        $this->defaultExperience = $defaultExperience;
    }

    /**
     * 経験値の初期値を設定
     *
     * @param int $defaultExperience 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withDefaultExperience(int $defaultExperience): CreateExperienceModelMasterRequest {
        $this->setDefaultExperience($defaultExperience);
        return $this;
    }

    /** @var int ランクキャップの初期値 */
    private $defaultRankCap;

    /**
     * ランクキャップの初期値を取得
     *
     * @return int|null 経験値の種類マスターを新規作成
     */
    public function getDefaultRankCap(): ?int {
        return $this->defaultRankCap;
    }

    /**
     * ランクキャップの初期値を設定
     *
     * @param int $defaultRankCap 経験値の種類マスターを新規作成
     */
    public function setDefaultRankCap(int $defaultRankCap) {
        $this->defaultRankCap = $defaultRankCap;
    }

    /**
     * ランクキャップの初期値を設定
     *
     * @param int $defaultRankCap 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withDefaultRankCap(int $defaultRankCap): CreateExperienceModelMasterRequest {
        $this->setDefaultRankCap($defaultRankCap);
        return $this;
    }

    /** @var int ランクキャップの最大値 */
    private $maxRankCap;

    /**
     * ランクキャップの最大値を取得
     *
     * @return int|null 経験値の種類マスターを新規作成
     */
    public function getMaxRankCap(): ?int {
        return $this->maxRankCap;
    }

    /**
     * ランクキャップの最大値を設定
     *
     * @param int $maxRankCap 経験値の種類マスターを新規作成
     */
    public function setMaxRankCap(int $maxRankCap) {
        $this->maxRankCap = $maxRankCap;
    }

    /**
     * ランクキャップの最大値を設定
     *
     * @param int $maxRankCap 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withMaxRankCap(int $maxRankCap): CreateExperienceModelMasterRequest {
        $this->setMaxRankCap($maxRankCap);
        return $this;
    }

    /** @var string ランク計算に用いる */
    private $rankThresholdId;

    /**
     * ランク計算に用いるを取得
     *
     * @return string|null 経験値の種類マスターを新規作成
     */
    public function getRankThresholdId(): ?string {
        return $this->rankThresholdId;
    }

    /**
     * ランク計算に用いるを設定
     *
     * @param string $rankThresholdId 経験値の種類マスターを新規作成
     */
    public function setRankThresholdId(string $rankThresholdId) {
        $this->rankThresholdId = $rankThresholdId;
    }

    /**
     * ランク計算に用いるを設定
     *
     * @param string $rankThresholdId 経験値の種類マスターを新規作成
     * @return CreateExperienceModelMasterRequest $this
     */
    public function withRankThresholdId(string $rankThresholdId): CreateExperienceModelMasterRequest {
        $this->setRankThresholdId($rankThresholdId);
        return $this;
    }

}