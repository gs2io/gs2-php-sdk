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
 * スタミナ回復間隔テーブルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRecoverIntervalTableMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナ回復間隔テーブルマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナ回復間隔テーブル名 */
    private $recoverIntervalTableName;

    /**
     * スタミナ回復間隔テーブル名を取得
     *
     * @return string|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getRecoverIntervalTableName(): ?string {
        return $this->recoverIntervalTableName;
    }

    /**
     * スタミナ回復間隔テーブル名を設定
     *
     * @param string $recoverIntervalTableName スタミナ回復間隔テーブルマスターを更新
     */
    public function setRecoverIntervalTableName(string $recoverIntervalTableName = null) {
        $this->recoverIntervalTableName = $recoverIntervalTableName;
    }

    /**
     * スタミナ回復間隔テーブル名を設定
     *
     * @param string $recoverIntervalTableName スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withRecoverIntervalTableName(string $recoverIntervalTableName = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setRecoverIntervalTableName($recoverIntervalTableName);
        return $this;
    }

    /** @var string スタミナ回復間隔テーブルマスターの説明 */
    private $description;

    /**
     * スタミナ回復間隔テーブルマスターの説明を取得
     *
     * @return string|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタミナ回復間隔テーブルマスターの説明を設定
     *
     * @param string $description スタミナ回復間隔テーブルマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * スタミナ回復間隔テーブルマスターの説明を設定
     *
     * @param string $description スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string スタミナ回復間隔テーブルのメタデータ */
    private $metadata;

    /**
     * スタミナ回復間隔テーブルのメタデータを取得
     *
     * @return string|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * スタミナ回復間隔テーブルのメタデータを設定
     *
     * @param string $metadata スタミナ回復間隔テーブルマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * スタミナ回復間隔テーブルのメタデータを設定
     *
     * @param string $metadata スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 経験値の種類マスター のGRN */
    private $experienceModelId;

    /**
     * 経験値の種類マスター のGRNを取得
     *
     * @return string|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getExperienceModelId(): ?string {
        return $this->experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナ回復間隔テーブルマスターを更新
     */
    public function setExperienceModelId(string $experienceModelId = null) {
        $this->experienceModelId = $experienceModelId;
    }

    /**
     * 経験値の種類マスター のGRNを設定
     *
     * @param string $experienceModelId スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withExperienceModelId(string $experienceModelId = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setExperienceModelId($experienceModelId);
        return $this;
    }

    /** @var int[] ランク毎のスタミナ回復間隔テーブル */
    private $values;

    /**
     * ランク毎のスタミナ回復間隔テーブルを取得
     *
     * @return int[]|null スタミナ回復間隔テーブルマスターを更新
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * ランク毎のスタミナ回復間隔テーブルを設定
     *
     * @param int[] $values スタミナ回復間隔テーブルマスターを更新
     */
    public function setValues(array $values = null) {
        $this->values = $values;
    }

    /**
     * ランク毎のスタミナ回復間隔テーブルを設定
     *
     * @param int[] $values スタミナ回復間隔テーブルマスターを更新
     * @return UpdateRecoverIntervalTableMasterRequest $this
     */
    public function withValues(array $values = null): UpdateRecoverIntervalTableMasterRequest {
        $this->setValues($values);
        return $this;
    }

}