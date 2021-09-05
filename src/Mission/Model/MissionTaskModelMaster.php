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


class MissionTaskModelMaster implements IModel {
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
	private $description;
	/**
     * @var string
	 */
	private $counterName;
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
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getMissionTaskId(): ?string {
		return $this->missionTaskId;
	}

	public function setMissionTaskId(?string $missionTaskId) {
		$this->missionTaskId = $missionTaskId;
	}

	public function withMissionTaskId(?string $missionTaskId): MissionTaskModelMaster {
		$this->missionTaskId = $missionTaskId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): MissionTaskModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): MissionTaskModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): MissionTaskModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): MissionTaskModelMaster {
		$this->counterName = $counterName;
		return $this;
	}

	public function getTargetValue(): ?int {
		return $this->targetValue;
	}

	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}

	public function withTargetValue(?int $targetValue): MissionTaskModelMaster {
		$this->targetValue = $targetValue;
		return $this;
	}

	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}

	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}

	public function withCompleteAcquireActions(?array $completeAcquireActions): MissionTaskModelMaster {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}

	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	public function withChallengePeriodEventId(?string $challengePeriodEventId): MissionTaskModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}

	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}

	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): MissionTaskModelMaster {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): MissionTaskModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): MissionTaskModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionTaskModelMaster {
        if ($data === null) {
            return null;
        }
        return (new MissionTaskModelMaster())
            ->withMissionTaskId(empty($data['missionTaskId']) ? null : $data['missionTaskId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName'])
            ->withTargetValue(empty($data['targetValue']) && $data['targetValue'] !== 0 ? null : $data['targetValue'])
            ->withCompleteAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('completeAcquireActions', $data) && $data['completeAcquireActions'] !== null ? $data['completeAcquireActions'] : []
            ))
            ->withChallengePeriodEventId(empty($data['challengePeriodEventId']) ? null : $data['challengePeriodEventId'])
            ->withPremiseMissionTaskName(empty($data['premiseMissionTaskName']) ? null : $data['premiseMissionTaskName'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "missionTaskId" => $this->getMissionTaskId(),
            "name" => $this->getName(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}