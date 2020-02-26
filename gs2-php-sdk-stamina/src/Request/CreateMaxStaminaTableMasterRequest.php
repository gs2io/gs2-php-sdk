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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタミナの最大値テーブルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateMaxStaminaTableMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値テーブルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateMaxStaminaTableMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 最大スタミナ値テーブル名 */
    private $name;

    /**
     * 最大スタミナ値テーブル名を取得
     *
     * @return string|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 最大スタミナ値テーブル名を設定
     *
     * @param string $name スタミナの最大値テーブルマスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 最大スタミナ値テーブル名を設定
     *
     * @param string $name スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withName(string $name): CreateMaxStaminaTableMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string スタミナの最大値テーブルマスターの説明 */
    private $description;

    /**
     * スタミナの最大値テーブルマスターの説明を取得
     *
     * @return string|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタミナの最大値テーブルマスターの説明を設定
     *
     * @param string $description スタミナの最大値テーブルマスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * スタミナの最大値テーブルマスターの説明を設定
     *
     * @param string $description スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withDescription(string $description): CreateMaxStaminaTableMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 最大スタミナ値テーブルのメタデータ */
    private $metadata;

    /**
     * 最大スタミナ値テーブルのメタデータを取得
     *
     * @return string|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 最大スタミナ値テーブルのメタデータを設定
     *
     * @param string $metadata スタミナの最大値テーブルマスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 最大スタミナ値テーブルのメタデータを設定
     *
     * @param string $metadata スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateMaxStaminaTableMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 経験値の種類マスター のGRN */
    private $experienceModelId;

    /**
     * 経験値の種類マスター のGRNを取得
     *
     * @return string|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getExperienceModelId(): ?string {
        return $this->experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナの最大値テーブルマスターを新規作成
     */
    public function setExperienceModelId(string $experienceModelId) {
        $this->experienceModelId = $experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withExperienceModelId(string $experienceModelId): CreateMaxStaminaTableMasterRequest {
        $this->setExperienceModelId($experienceModelId);
        return $this;
    }

    /** @var int[] ランク毎のスタミナの最大値テーブル */
    private $values;

    /**
     * ランク毎のスタミナの最大値テーブルを取得
     *
     * @return int[]|null スタミナの最大値テーブルマスターを新規作成
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * ランク毎のスタミナの最大値テーブルを設定
     *
     * @param int[] $values スタミナの最大値テーブルマスターを新規作成
     */
    public function setValues(array $values) {
        $this->values = $values;
    }

    /**
     * ランク毎のスタミナの最大値テーブルを設定
     *
     * @param int[] $values スタミナの最大値テーブルマスターを新規作成
     * @return CreateMaxStaminaTableMasterRequest $this
     */
    public function withValues(array $values): CreateMaxStaminaTableMasterRequest {
        $this->setValues($values);
        return $this;
    }

}