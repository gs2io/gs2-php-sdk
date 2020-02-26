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
 * スタミナ回復量テーブルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRecoverValueTableMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナ回復量テーブルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナ回復量テーブルマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateRecoverValueTableMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナ回復量テーブル名 */
    private $recoverValueTableName;

    /**
     * スタミナ回復量テーブル名を取得
     *
     * @return string|null スタミナ回復量テーブルマスターを更新
     */
    public function getRecoverValueTableName(): ?string {
        return $this->recoverValueTableName;
    }

    /**
     * スタミナ回復量テーブル名を設定
     *
     * @param string $recoverValueTableName スタミナ回復量テーブルマスターを更新
     */
    public function setRecoverValueTableName(string $recoverValueTableName) {
        $this->recoverValueTableName = $recoverValueTableName;
    }

    /**
     * スタミナ回復量テーブル名を設定
     *
     * @param string $recoverValueTableName スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withRecoverValueTableName(string $recoverValueTableName): UpdateRecoverValueTableMasterRequest {
        $this->setRecoverValueTableName($recoverValueTableName);
        return $this;
    }

    /** @var string スタミナ回復量テーブルマスターの説明 */
    private $description;

    /**
     * スタミナ回復量テーブルマスターの説明を取得
     *
     * @return string|null スタミナ回復量テーブルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタミナ回復量テーブルマスターの説明を設定
     *
     * @param string $description スタミナ回復量テーブルマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * スタミナ回復量テーブルマスターの説明を設定
     *
     * @param string $description スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withDescription(string $description): UpdateRecoverValueTableMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string スタミナ回復量テーブルのメタデータ */
    private $metadata;

    /**
     * スタミナ回復量テーブルのメタデータを取得
     *
     * @return string|null スタミナ回復量テーブルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * スタミナ回復量テーブルのメタデータを設定
     *
     * @param string $metadata スタミナ回復量テーブルマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * スタミナ回復量テーブルのメタデータを設定
     *
     * @param string $metadata スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateRecoverValueTableMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 経験値の種類マスター のGRN */
    private $experienceModelId;

    /**
     * 経験値の種類マスター のGRNを取得
     *
     * @return string|null スタミナ回復量テーブルマスターを更新
     */
    public function getExperienceModelId(): ?string {
        return $this->experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナ回復量テーブルマスターを更新
     */
    public function setExperienceModelId(string $experienceModelId) {
        $this->experienceModelId = $experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withExperienceModelId(string $experienceModelId): UpdateRecoverValueTableMasterRequest {
        $this->setExperienceModelId($experienceModelId);
        return $this;
    }

    /** @var int[] ランク毎のスタミナ回復量テーブル */
    private $values;

    /**
     * ランク毎のスタミナ回復量テーブルを取得
     *
     * @return int[]|null スタミナ回復量テーブルマスターを更新
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * ランク毎のスタミナ回復量テーブルを設定
     *
     * @param int[] $values スタミナ回復量テーブルマスターを更新
     */
    public function setValues(array $values) {
        $this->values = $values;
    }

    /**
     * ランク毎のスタミナ回復量テーブルを設定
     *
     * @param int[] $values スタミナ回復量テーブルマスターを更新
     * @return UpdateRecoverValueTableMasterRequest $this
     */
    public function withValues(array $values): UpdateRecoverValueTableMasterRequest {
        $this->setValues($values);
        return $this;
    }

}