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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 回数制限の種類マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateLimitModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 回数制限の種類マスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateLimitModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 回数制限の種類名 */
    private $limitName;

    /**
     * 回数制限の種類名を取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getLimitName(): ?string {
        return $this->limitName;
    }

    /**
     * 回数制限の種類名を設定
     *
     * @param string $limitName 回数制限の種類マスターを更新
     */
    public function setLimitName(string $limitName = null) {
        $this->limitName = $limitName;
    }

    /**
     * 回数制限の種類名を設定
     *
     * @param string $limitName 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withLimitName(string $limitName = null): UpdateLimitModelMasterRequest {
        $this->setLimitName($limitName);
        return $this;
    }

    /** @var string 回数制限の種類マスターの説明 */
    private $description;

    /**
     * 回数制限の種類マスターの説明を取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 回数制限の種類マスターの説明を設定
     *
     * @param string $description 回数制限の種類マスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 回数制限の種類マスターの説明を設定
     *
     * @param string $description 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateLimitModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 回数制限の種類のメタデータ */
    private $metadata;

    /**
     * 回数制限の種類のメタデータを取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 回数制限の種類のメタデータを設定
     *
     * @param string $metadata 回数制限の種類マスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 回数制限の種類のメタデータを設定
     *
     * @param string $metadata 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateLimitModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string リセットタイミング */
    private $resetType;

    /**
     * リセットタイミングを取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getResetType(): ?string {
        return $this->resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType 回数制限の種類マスターを更新
     */
    public function setResetType(string $resetType = null) {
        $this->resetType = $resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withResetType(string $resetType = null): UpdateLimitModelMasterRequest {
        $this->setResetType($resetType);
        return $this;
    }

    /** @var int リセットをする日にち */
    private $resetDayOfMonth;

    /**
     * リセットをする日にちを取得
     *
     * @return int|null 回数制限の種類マスターを更新
     */
    public function getResetDayOfMonth(): ?int {
        return $this->resetDayOfMonth;
    }

    /**
     * リセットをする日にちを設定
     *
     * @param int $resetDayOfMonth 回数制限の種類マスターを更新
     */
    public function setResetDayOfMonth(int $resetDayOfMonth = null) {
        $this->resetDayOfMonth = $resetDayOfMonth;
    }

    /**
     * リセットをする日にちを設定
     *
     * @param int $resetDayOfMonth 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withResetDayOfMonth(int $resetDayOfMonth = null): UpdateLimitModelMasterRequest {
        $this->setResetDayOfMonth($resetDayOfMonth);
        return $this;
    }

    /** @var string リセットする曜日 */
    private $resetDayOfWeek;

    /**
     * リセットする曜日を取得
     *
     * @return string|null 回数制限の種類マスターを更新
     */
    public function getResetDayOfWeek(): ?string {
        return $this->resetDayOfWeek;
    }

    /**
     * リセットする曜日を設定
     *
     * @param string $resetDayOfWeek 回数制限の種類マスターを更新
     */
    public function setResetDayOfWeek(string $resetDayOfWeek = null) {
        $this->resetDayOfWeek = $resetDayOfWeek;
    }

    /**
     * リセットする曜日を設定
     *
     * @param string $resetDayOfWeek 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withResetDayOfWeek(string $resetDayOfWeek = null): UpdateLimitModelMasterRequest {
        $this->setResetDayOfWeek($resetDayOfWeek);
        return $this;
    }

    /** @var int リセット時刻 */
    private $resetHour;

    /**
     * リセット時刻を取得
     *
     * @return int|null 回数制限の種類マスターを更新
     */
    public function getResetHour(): ?int {
        return $this->resetHour;
    }

    /**
     * リセット時刻を設定
     *
     * @param int $resetHour 回数制限の種類マスターを更新
     */
    public function setResetHour(int $resetHour = null) {
        $this->resetHour = $resetHour;
    }

    /**
     * リセット時刻を設定
     *
     * @param int $resetHour 回数制限の種類マスターを更新
     * @return UpdateLimitModelMasterRequest $this
     */
    public function withResetHour(int $resetHour = null): UpdateLimitModelMasterRequest {
        $this->setResetHour($resetHour);
        return $this;
    }

}