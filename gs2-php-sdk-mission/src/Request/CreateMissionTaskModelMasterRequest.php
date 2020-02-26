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
 * ミッションタスクマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateMissionTaskModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateMissionTaskModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $missionGroupName;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを新規作成
     */
    public function setMissionGroupName(string $missionGroupName) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withMissionGroupName(string $missionGroupName): CreateMissionTaskModelMasterRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $name;

    /**
     * タスク名を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * タスク名を設定
     *
     * @param string $name ミッションタスクマスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * タスク名を設定
     *
     * @param string $name ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withName(string $name): CreateMissionTaskModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッションタスクマスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateMissionTaskModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string ミッションタスクの説明 */
    private $description;

    /**
     * ミッションタスクの説明を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ミッションタスクの説明を設定
     *
     * @param string $description ミッションタスクマスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ミッションタスクの説明を設定
     *
     * @param string $description ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withDescription(string $description): CreateMissionTaskModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string カウンター名 */
    private $counterName;

    /**
     * カウンター名を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getCounterName(): ?string {
        return $this->counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName ミッションタスクマスターを新規作成
     */
    public function setCounterName(string $counterName) {
        $this->counterName = $counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withCounterName(string $counterName): CreateMissionTaskModelMasterRequest {
        $this->setCounterName($counterName);
        return $this;
    }

    /** @var string リセットタイミング */
    private $resetType;

    /**
     * リセットタイミングを取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getResetType(): ?string {
        return $this->resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッションタスクマスターを新規作成
     */
    public function setResetType(string $resetType) {
        $this->resetType = $resetType;
    }

    /**
     * リセットタイミングを設定
     *
     * @param string $resetType ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withResetType(string $resetType): CreateMissionTaskModelMasterRequest {
        $this->setResetType($resetType);
        return $this;
    }

    /** @var int 目標値 */
    private $targetValue;

    /**
     * 目標値を取得
     *
     * @return int|null ミッションタスクマスターを新規作成
     */
    public function getTargetValue(): ?int {
        return $this->targetValue;
    }

    /**
     * 目標値を設定
     *
     * @param int $targetValue ミッションタスクマスターを新規作成
     */
    public function setTargetValue(int $targetValue) {
        $this->targetValue = $targetValue;
    }

    /**
     * 目標値を設定
     *
     * @param int $targetValue ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withTargetValue(int $targetValue): CreateMissionTaskModelMasterRequest {
        $this->setTargetValue($targetValue);
        return $this;
    }

    /** @var AcquireAction[] ミッション達成時の報酬 */
    private $completeAcquireActions;

    /**
     * ミッション達成時の報酬を取得
     *
     * @return AcquireAction[]|null ミッションタスクマスターを新規作成
     */
    public function getCompleteAcquireActions(): ?array {
        return $this->completeAcquireActions;
    }

    /**
     * ミッション達成時の報酬を設定
     *
     * @param AcquireAction[] $completeAcquireActions ミッションタスクマスターを新規作成
     */
    public function setCompleteAcquireActions(array $completeAcquireActions) {
        $this->completeAcquireActions = $completeAcquireActions;
    }

    /**
     * ミッション達成時の報酬を設定
     *
     * @param AcquireAction[] $completeAcquireActions ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withCompleteAcquireActions(array $completeAcquireActions): CreateMissionTaskModelMasterRequest {
        $this->setCompleteAcquireActions($completeAcquireActions);
        return $this;
    }

    /** @var string 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN */
    private $challengePeriodEventId;

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getChallengePeriodEventId(): ?string {
        return $this->challengePeriodEventId;
    }

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId ミッションタスクマスターを新規作成
     */
    public function setChallengePeriodEventId(string $challengePeriodEventId) {
        $this->challengePeriodEventId = $challengePeriodEventId;
    }

    /**
     * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
     *
     * @param string $challengePeriodEventId ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withChallengePeriodEventId(string $challengePeriodEventId): CreateMissionTaskModelMasterRequest {
        $this->setChallengePeriodEventId($challengePeriodEventId);
        return $this;
    }

    /** @var string このタスクに挑戦するために達成しておく必要のあるタスクの名前 */
    private $premiseMissionTaskName;

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を取得
     *
     * @return string|null ミッションタスクマスターを新規作成
     */
    public function getPremiseMissionTaskName(): ?string {
        return $this->premiseMissionTaskName;
    }

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
     *
     * @param string $premiseMissionTaskName ミッションタスクマスターを新規作成
     */
    public function setPremiseMissionTaskName(string $premiseMissionTaskName) {
        $this->premiseMissionTaskName = $premiseMissionTaskName;
    }

    /**
     * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
     *
     * @param string $premiseMissionTaskName ミッションタスクマスターを新規作成
     * @return CreateMissionTaskModelMasterRequest $this
     */
    public function withPremiseMissionTaskName(string $premiseMissionTaskName): CreateMissionTaskModelMasterRequest {
        $this->setPremiseMissionTaskName($premiseMissionTaskName);
        return $this;
    }

}