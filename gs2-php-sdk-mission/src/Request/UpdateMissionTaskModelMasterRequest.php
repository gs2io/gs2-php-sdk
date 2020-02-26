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
use Gs2\Mission\Model\AcquireAction;

/**
 * ミッションタスクマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateMissionTaskModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateMissionTaskModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $missionGroupName;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを更新
     */
    public function setMissionGroupName(string $missionGroupName) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withMissionGroupName(string $missionGroupName): UpdateMissionTaskModelMasterRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $missionTaskName;

    /**
     * タスク名を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getMissionTaskName(): ?string {
        return $this->missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクマスターを更新
     */
    public function setMissionTaskName(string $missionTaskName) {
        $this->missionTaskName = $missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withMissionTaskName(string $missionTaskName): UpdateMissionTaskModelMasterRequest {
        $this->setMissionTaskName($missionTaskName);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッションタスクマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateMissionTaskModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string ミッションタスクの説明 */
    private $description;

    /**
     * ミッションタスクの説明を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ミッションタスクの説明を設定
     *
     * @param string $description ミッションタスクマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ミッションタスクの説明を設定
     *
     * @param string $description ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateMissionTaskModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string カウンター名 */
    private $counterName;

    /**
     * カウンター名を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getCounterName(): ?string {
        return $this->counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName ミッションタスクマスターを更新
     */
    public function setCounterName(string $counterName) {
        $this->counterName = $counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withCounterName(string $counterName): UpdateMissionTaskModelMasterRequest {
        $this->setCounterName($counterName);
        return $this;
    }

    /** @var string リセットタイミング */
    private $resetType;

    /**
     * リセットタイミングを取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getResetType(): ?string {
        return $this->resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッションタスクマスターを更新
     */
    public function setResetType(string $resetType) {
        $this->resetType = $resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withResetType(string $resetType): UpdateMissionTaskModelMasterRequest {
        $this->setResetType($resetType);
        return $this;
    }

    /** @var int 目標値 */
    private $targetValue;

    /**
     * 目標値を取得
     *
     * @return int|null ミッションタスクマスターを更新
     */
    public function getTargetValue(): ?int {
        return $this->targetValue;
    }

    /**
     * 目標値を設定
     *
     * @param int $targetValue ミッションタスクマスターを更新
     */
    public function setTargetValue(int $targetValue) {
        $this->targetValue = $targetValue;
    }

    /**
     * 目標値を設定
     *
     * @param int $targetValue ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withTargetValue(int $targetValue): UpdateMissionTaskModelMasterRequest {
        $this->setTargetValue($targetValue);
        return $this;
    }

    /** @var AcquireAction[] ミッション達成時の報酬 */
    private $completeAcquireActions;

    /**
     * ミッション達成時の報酬を取得
     *
     * @return AcquireAction[]|null ミッションタスクマスターを更新
     */
    public function getCompleteAcquireActions(): ?array {
        return $this->completeAcquireActions;
    }

    /**
     * ミッション達成時の報酬を設定
     *
     * @param AcquireAction[] $completeAcquireActions ミッションタスクマスターを更新
     */
    public function setCompleteAcquireActions(array $completeAcquireActions) {
        $this->completeAcquireActions = $completeAcquireActions;
    }

    /**
     * ミッション達成時の報酬を設定
     *
     * @param AcquireAction[] $completeAcquireActions ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withCompleteAcquireActions(array $completeAcquireActions): UpdateMissionTaskModelMasterRequest {
        $this->setCompleteAcquireActions($completeAcquireActions);
        return $this;
    }

    /** @var string 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId ミッションタスクマスターを更新
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId): UpdateMissionTaskModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

    /** @var string このタスクに挑戦するために達成しておく必要のあるタスクの名前 */
    private $premiseMissionTaskName;

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を取得
     *
     * @return string|null ミッションタスクマスターを更新
     */
    public function getPremiseMissionTaskName(): ?string {
        return $this->premiseMissionTaskName;
    }

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
     *
     * @param string $premiseMissionTaskName ミッションタスクマスターを更新
     */
    public function setPremiseMissionTaskName(string $premiseMissionTaskName) {
        $this->premiseMissionTaskName = $premiseMissionTaskName;
    }

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
     *
     * @param string $premiseMissionTaskName ミッションタスクマスターを更新
     * @return UpdateMissionTaskModelMasterRequest $this
     */
    public function withPremiseMissionTaskName(string $premiseMissionTaskName): UpdateMissionTaskModelMasterRequest {
        $this->setPremiseMissionTaskName($premiseMissionTaskName);
        return $this;
    }

}