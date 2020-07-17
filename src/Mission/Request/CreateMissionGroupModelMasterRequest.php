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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ミッショングループマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateMissionGroupModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッショングループマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateMissionGroupModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $name;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $name ミッショングループマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $name ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withName(string $name = null): CreateMissionGroupModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッショングループマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateMissionGroupModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string ミッショングループの説明 */
    private $description;

    /**
     * ミッショングループの説明を取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ミッショングループの説明を設定
     *
     * @param string $description ミッショングループマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ミッショングループの説明を設定
     *
     * @param string $description ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateMissionGroupModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string リセットタイミング */
    private $resetType;

    /**
     * リセットタイミングを取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getResetType(): ?string {
        return $this->resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッショングループマスターを新規作成
     */
    public function setResetType(string $resetType = null) {
        $this->resetType = $resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withResetType(string $resetType = null): CreateMissionGroupModelMasterRequest {
        $this->setResetType($resetType);
        return $this;
    }

    /** @var int リセットをする日にち */
    private $resetDayOfMonth;

    /**
     * リセットをする日にちを取得
     *
     * @return int|null ミッショングループマスターを新規作成
     */
    public function getResetDayOfMonth(): ?int {
        return $this->resetDayOfMonth;
    }

    /**
     * リセットをする日にちを設定
     *
     * @param int $resetDayOfMonth ミッショングループマスターを新規作成
     */
    public function setResetDayOfMonth(int $resetDayOfMonth = null) {
        $this->resetDayOfMonth = $resetDayOfMonth;
    }

    /**
     * リセットをする日にちを設定
     *
     * @param int $resetDayOfMonth ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withResetDayOfMonth(int $resetDayOfMonth = null): CreateMissionGroupModelMasterRequest {
        $this->setResetDayOfMonth($resetDayOfMonth);
        return $this;
    }

    /** @var string リセットする曜日 */
    private $resetDayOfWeek;

    /**
     * リセットする曜日を取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getResetDayOfWeek(): ?string {
        return $this->resetDayOfWeek;
    }

    /**
     * リセットする曜日を設定
     *
     * @param string $resetDayOfWeek ミッショングループマスターを新規作成
     */
    public function setResetDayOfWeek(string $resetDayOfWeek = null) {
        $this->resetDayOfWeek = $resetDayOfWeek;
    }

    /**
     * リセットする曜日を設定
     *
     * @param string $resetDayOfWeek ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withResetDayOfWeek(string $resetDayOfWeek = null): CreateMissionGroupModelMasterRequest {
        $this->setResetDayOfWeek($resetDayOfWeek);
        return $this;
    }

    /** @var int リセット時刻 */
    private $resetHour;

    /**
     * リセット時刻を取得
     *
     * @return int|null ミッショングループマスターを新規作成
     */
    public function getResetHour(): ?int {
        return $this->resetHour;
    }

    /**
     * リセット時刻を設定
     *
     * @param int $resetHour ミッショングループマスターを新規作成
     */
    public function setResetHour(int $resetHour = null) {
        $this->resetHour = $resetHour;
    }

    /**
     * リセット時刻を設定
     *
     * @param int $resetHour ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withResetHour(int $resetHour = null): CreateMissionGroupModelMasterRequest {
        $this->setResetHour($resetHour);
        return $this;
    }

    /** @var string ミッションを達成したときの通知先ネームスペース のGRN */
    private $completeNotificationNamespaceId;

    /**
     * ミッションを達成したときの通知先ネームスペース のGRNを取得
     *
     * @return string|null ミッショングループマスターを新規作成
     */
    public function getCompleteNotificationNamespaceId(): ?string {
        return $this->completeNotificationNamespaceId;
    }

    /**
     * ミッションを達成したときの通知先ネームスペース のGRNを設定
     *
     * @param string $completeNotificationNamespaceId ミッショングループマスターを新規作成
     */
    public function setCompleteNotificationNamespaceId(string $completeNotificationNamespaceId = null) {
        $this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
    }

    /**
     * ミッションを達成したときの通知先ネームスペース のGRNを設定
     *
     * @param string $completeNotificationNamespaceId ミッショングループマスターを新規作成
     * @return CreateMissionGroupModelMasterRequest $this
     */
    public function withCompleteNotificationNamespaceId(string $completeNotificationNamespaceId = null): CreateMissionGroupModelMasterRequest {
        $this->setCompleteNotificationNamespaceId($completeNotificationNamespaceId);
        return $this;
    }

}