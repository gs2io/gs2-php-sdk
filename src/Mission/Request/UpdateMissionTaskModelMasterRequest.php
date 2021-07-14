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

class UpdateMissionTaskModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $missionTaskName;
    /** @var string */
    private $metadata;
    /** @var string */
    private $description;
    /** @var string */
    private $counterName;
    /** @var int */
    private $targetValue;
    /** @var array */
    private $completeAcquireActions;
    /** @var string */
    private $challengePeriodEventId;
    /** @var string */
    private $premiseMissionTaskName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateMissionTaskModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}

	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}

	public function withMissionGroupName(?string $missionGroupName): UpdateMissionTaskModelMasterRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

	public function getMissionTaskName(): ?string {
		return $this->missionTaskName;
	}

	public function setMissionTaskName(?string $missionTaskName) {
		$this->missionTaskName = $missionTaskName;
	}

	public function withMissionTaskName(?string $missionTaskName): UpdateMissionTaskModelMasterRequest {
		$this->missionTaskName = $missionTaskName;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateMissionTaskModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateMissionTaskModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): UpdateMissionTaskModelMasterRequest {
		$this->counterName = $counterName;
		return $this;
	}

	public function getTargetValue(): ?int {
		return $this->targetValue;
	}

	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}

	public function withTargetValue(?int $targetValue): UpdateMissionTaskModelMasterRequest {
		$this->targetValue = $targetValue;
		return $this;
	}

	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}

	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}

	public function withCompleteAcquireActions(?array $completeAcquireActions): UpdateMissionTaskModelMasterRequest {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	public function withChallengePeriodEventId(?string $challengePeriodEventId): UpdateMissionTaskModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}

	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}

	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): UpdateMissionTaskModelMasterRequest {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMissionTaskModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMissionTaskModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withMissionGroupName(empty($data['missionGroupName']) ? null : $data['missionGroupName'])
            ->withMissionTaskName(empty($data['missionTaskName']) ? null : $data['missionTaskName'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName'])
            ->withTargetValue(empty($data['targetValue']) ? null : $data['targetValue'])
            ->withCompleteAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('completeAcquireActions', $data) && $data['completeAcquireActions'] !== null ? $data['completeAcquireActions'] : []
            ))
            ->withChallengePeriodEventId(empty($data['challengePeriodEventId']) ? null : $data['challengePeriodEventId'])
            ->withPremiseMissionTaskName(empty($data['premiseMissionTaskName']) ? null : $data['premiseMissionTaskName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "missionTaskName" => $this->getMissionTaskName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "counterName" => $this->getCounterName(),
            "targetValue" => $this->getTargetValue(),
            "completeAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCompleteAcquireActions() !== null && $this->getCompleteAcquireActions() !== null ? $this->getCompleteAcquireActions() : []
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "premiseMissionTaskName" => $this->getPremiseMissionTaskName(),
        );
    }
}