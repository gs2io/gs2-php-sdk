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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


class MissionTaskModel implements IModel {
	/**
     * @var string
	 */
	private $missionTaskId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $counterName;
	/**
     * @var string
	 */
	private $targetResetType;
	/**
     * @var int
	 */
	private $targetValue;
	/**
     * @var array
	 */
	private $completeAcquireActions;
	/**
     * @var string
	 */
	private $challengePeriodEventId;
	/**
     * @var string
	 */
	private $premiseMissionTaskName;
	public function getMissionTaskId(): ?string {
		return $this->missionTaskId;
	}
	public function setMissionTaskId(?string $missionTaskId) {
		$this->missionTaskId = $missionTaskId;
	}
	public function withMissionTaskId(?string $missionTaskId): MissionTaskModel {
		$this->missionTaskId = $missionTaskId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): MissionTaskModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): MissionTaskModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getCounterName(): ?string {
		return $this->counterName;
	}
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
	public function withCounterName(?string $counterName): MissionTaskModel {
		$this->counterName = $counterName;
		return $this;
	}
	public function getTargetResetType(): ?string {
		return $this->targetResetType;
	}
	public function setTargetResetType(?string $targetResetType) {
		$this->targetResetType = $targetResetType;
	}
	public function withTargetResetType(?string $targetResetType): MissionTaskModel {
		$this->targetResetType = $targetResetType;
		return $this;
	}
	public function getTargetValue(): ?int {
		return $this->targetValue;
	}
	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}
	public function withTargetValue(?int $targetValue): MissionTaskModel {
		$this->targetValue = $targetValue;
		return $this;
	}
	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}
	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}
	public function withCompleteAcquireActions(?array $completeAcquireActions): MissionTaskModel {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
	public function withChallengePeriodEventId(?string $challengePeriodEventId): MissionTaskModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}
	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}
	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): MissionTaskModel {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionTaskModel {
        if ($data === null) {
            return null;
        }
        return (new MissionTaskModel())
            ->withMissionTaskId(array_key_exists('missionTaskId', $data) && $data['missionTaskId'] !== null ? $data['missionTaskId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withTargetResetType(array_key_exists('targetResetType', $data) && $data['targetResetType'] !== null ? $data['targetResetType'] : null)
            ->withTargetValue(array_key_exists('targetValue', $data) && $data['targetValue'] !== null ? $data['targetValue'] : null)
            ->withCompleteAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('completeAcquireActions', $data) && $data['completeAcquireActions'] !== null ? $data['completeAcquireActions'] : []
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withPremiseMissionTaskName(array_key_exists('premiseMissionTaskName', $data) && $data['premiseMissionTaskName'] !== null ? $data['premiseMissionTaskName'] : null);
    }

    public function toJson(): array {
        return array(
            "missionTaskId" => $this->getMissionTaskId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "counterName" => $this->getCounterName(),
            "targetResetType" => $this->getTargetResetType(),
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