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
 * スタミナモデルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateStaminaModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナモデルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateStaminaModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $name;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $name スタミナモデルマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $name スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withName(string $name = null): CreateStaminaModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string スタミナモデルマスターの説明 */
    private $description;

    /**
     * スタミナモデルマスターの説明を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタミナモデルマスターの説明を設定
     *
     * @param string $description スタミナモデルマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * スタミナモデルマスターの説明を設定
     *
     * @param string $description スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateStaminaModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string スタミナの種類のメタデータ */
    private $metadata;

    /**
     * スタミナの種類のメタデータを取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * スタミナの種類のメタデータを設定
     *
     * @param string $metadata スタミナモデルマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * スタミナの種類のメタデータを設定
     *
     * @param string $metadata スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateStaminaModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int スタミナを回復する速度(分) */
    private $recoverIntervalMinutes;

    /**
     * スタミナを回復する速度(分)を取得
     *
     * @return int|null スタミナモデルマスターを新規作成
     */
    public function getRecoverIntervalMinutes(): ?int {
        return $this->recoverIntervalMinutes;
    }

    /**
     * スタミナを回復する速度(分)を設定
     *
     * @param int $recoverIntervalMinutes スタミナモデルマスターを新規作成
     */
    public function setRecoverIntervalMinutes(int $recoverIntervalMinutes = null) {
        $this->recoverIntervalMinutes = $recoverIntervalMinutes;
    }

    /**
     * スタミナを回復する速度(分)を設定
     *
     * @param int $recoverIntervalMinutes スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withRecoverIntervalMinutes(int $recoverIntervalMinutes = null): CreateStaminaModelMasterRequest {
        $this->setRecoverIntervalMinutes($recoverIntervalMinutes);
        return $this;
    }

    /** @var int 時間経過後に回復する量 */
    private $recoverValue;

    /**
     * 時間経過後に回復する量を取得
     *
     * @return int|null スタミナモデルマスターを新規作成
     */
    public function getRecoverValue(): ?int {
        return $this->recoverValue;
    }

    /**
     * 時間経過後に回復する量を設定
     *
     * @param int $recoverValue スタミナモデルマスターを新規作成
     */
    public function setRecoverValue(int $recoverValue = null) {
        $this->recoverValue = $recoverValue;
    }

    /**
     * 時間経過後に回復する量を設定
     *
     * @param int $recoverValue スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withRecoverValue(int $recoverValue = null): CreateStaminaModelMasterRequest {
        $this->setRecoverValue($recoverValue);
        return $this;
    }

    /** @var int スタミナの最大値の初期値 */
    private $initialCapacity;

    /**
     * スタミナの最大値の初期値を取得
     *
     * @return int|null スタミナモデルマスターを新規作成
     */
    public function getInitialCapacity(): ?int {
        return $this->initialCapacity;
    }

    /**
     * スタミナの最大値の初期値を設定
     *
     * @param int $initialCapacity スタミナモデルマスターを新規作成
     */
    public function setInitialCapacity(int $initialCapacity = null) {
        $this->initialCapacity = $initialCapacity;
    }

    /**
     * スタミナの最大値の初期値を設定
     *
     * @param int $initialCapacity スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withInitialCapacity(int $initialCapacity = null): CreateStaminaModelMasterRequest {
        $this->setInitialCapacity($initialCapacity);
        return $this;
    }

    /** @var bool 最大値を超えて回復するか */
    private $isOverflow;

    /**
     * 最大値を超えて回復するかを取得
     *
     * @return bool|null スタミナモデルマスターを新規作成
     */
    public function getIsOverflow(): ?bool {
        return $this->isOverflow;
    }

    /**
     * 最大値を超えて回復するかを設定
     *
     * @param bool $isOverflow スタミナモデルマスターを新規作成
     */
    public function setIsOverflow(bool $isOverflow = null) {
        $this->isOverflow = $isOverflow;
    }

    /**
     * 最大値を超えて回復するかを設定
     *
     * @param bool $isOverflow スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withIsOverflow(bool $isOverflow = null): CreateStaminaModelMasterRequest {
        $this->setIsOverflow($isOverflow);
        return $this;
    }

    /** @var int 溢れた状況での最大値 */
    private $maxCapacity;

    /**
     * 溢れた状況での最大値を取得
     *
     * @return int|null スタミナモデルマスターを新規作成
     */
    public function getMaxCapacity(): ?int {
        return $this->maxCapacity;
    }

    /**
     * 溢れた状況での最大値を設定
     *
     * @param int $maxCapacity スタミナモデルマスターを新規作成
     */
    public function setMaxCapacity(int $maxCapacity = null) {
        $this->maxCapacity = $maxCapacity;
    }

    /**
     * 溢れた状況での最大値を設定
     *
     * @param int $maxCapacity スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withMaxCapacity(int $maxCapacity = null): CreateStaminaModelMasterRequest {
        $this->setMaxCapacity($maxCapacity);
        return $this;
    }

    /** @var string GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名 */
    private $maxStaminaTableName;

    /**
     * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getMaxStaminaTableName(): ?string {
        return $this->maxStaminaTableName;
    }

    /**
     * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を設定
     *
     * @param string $maxStaminaTableName スタミナモデルマスターを新規作成
     */
    public function setMaxStaminaTableName(string $maxStaminaTableName = null) {
        $this->maxStaminaTableName = $maxStaminaTableName;
    }

    /**
     * GS2-Experience のランクによって最大スタミナ値を決定するスタミナ最大値テーブル名を設定
     *
     * @param string $maxStaminaTableName スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withMaxStaminaTableName(string $maxStaminaTableName = null): CreateStaminaModelMasterRequest {
        $this->setMaxStaminaTableName($maxStaminaTableName);
        return $this;
    }

    /** @var string GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名 */
    private $recoverIntervalTableName;

    /**
     * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getRecoverIntervalTableName(): ?string {
        return $this->recoverIntervalTableName;
    }

    /**
     * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を設定
     *
     * @param string $recoverIntervalTableName スタミナモデルマスターを新規作成
     */
    public function setRecoverIntervalTableName(string $recoverIntervalTableName = null) {
        $this->recoverIntervalTableName = $recoverIntervalTableName;
    }

    /**
     * GS2-Experience のランクによってスタミナの回復間隔を決定する回復間隔テーブル名を設定
     *
     * @param string $recoverIntervalTableName スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withRecoverIntervalTableName(string $recoverIntervalTableName = null): CreateStaminaModelMasterRequest {
        $this->setRecoverIntervalTableName($recoverIntervalTableName);
        return $this;
    }

    /** @var string GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名 */
    private $recoverValueTableName;

    /**
     * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を取得
     *
     * @return string|null スタミナモデルマスターを新規作成
     */
    public function getRecoverValueTableName(): ?string {
        return $this->recoverValueTableName;
    }

    /**
     * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を設定
     *
     * @param string $recoverValueTableName スタミナモデルマスターを新規作成
     */
    public function setRecoverValueTableName(string $recoverValueTableName = null) {
        $this->recoverValueTableName = $recoverValueTableName;
    }

    /**
     * GS2-Experience のランクによってスタミナの回復量を決定する回復量テーブル名を設定
     *
     * @param string $recoverValueTableName スタミナモデルマスターを新規作成
     * @return CreateStaminaModelMasterRequest $this
     */
    public function withRecoverValueTableName(string $recoverValueTableName = null): CreateStaminaModelMasterRequest {
        $this->setRecoverValueTableName($recoverValueTableName);
        return $this;
    }

}