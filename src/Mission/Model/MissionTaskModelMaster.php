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


/**
 * Mission Task Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#missiontaskmodelmaster
 */
class MissionTaskModelMaster implements IModel {
	/**
     * @var string Mission Task Model Master GRN
	 */
	private $missionTaskId;
	/**
     * @var string Mission Task Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Completion condition type
	 */
	private $verifyCompleteType;
	/**
     * @var TargetCounterModel Target Counter
	 */
	private $targetCounter;
	/**
     * @var array Verify Actions when task is accomplished
	 */
	private $verifyCompleteConsumeActions;
	/**
     * @var array Rewards for mission accomplishment
	 */
	private $completeAcquireActions;
	/**
     * @var string GS2-Schedule event GRN with a set period of time during which rewards can be received
	 */
	private $challengePeriodEventId;
	/**
     * @var string Name of the task that must be accomplished to attempt this task
	 */
	private $premiseMissionTaskName;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
	/**
     * @var string Counter Model name
	 */
	private $counterName;
	/**
     * @var string Target Reset timing
	 */
	private $targetResetType;
	/**
     * @var int Target value
	 */
	private $targetValue;
    /** @return string|null Mission Task Model Master GRN */
	public function getMissionTaskId(): ?string {
		return $this->missionTaskId;
	}
    /** @param string|null $missionTaskId Mission Task Model Master GRN */
	public function setMissionTaskId(?string $missionTaskId) {
		$this->missionTaskId = $missionTaskId;
	}
    /**
     * @param string|null $missionTaskId Mission Task Model Master GRN
     * @return MissionTaskModelMaster
     */
	public function withMissionTaskId(?string $missionTaskId): MissionTaskModelMaster {
		$this->missionTaskId = $missionTaskId;
		return $this;
	}
    /** @return string|null Mission Task Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Mission Task Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Mission Task Model name
     * @return MissionTaskModelMaster
     */
	public function withName(?string $name): MissionTaskModelMaster {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return MissionTaskModelMaster
     */
	public function withMetadata(?string $metadata): MissionTaskModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return MissionTaskModelMaster
     */
	public function withDescription(?string $description): MissionTaskModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Completion condition type */
	public function getVerifyCompleteType(): ?string {
		return $this->verifyCompleteType;
	}
    /** @param string|null $verifyCompleteType Completion condition type */
	public function setVerifyCompleteType(?string $verifyCompleteType) {
		$this->verifyCompleteType = $verifyCompleteType;
	}
    /**
     * @param string|null $verifyCompleteType Completion condition type
     * @return MissionTaskModelMaster
     */
	public function withVerifyCompleteType(?string $verifyCompleteType): MissionTaskModelMaster {
		$this->verifyCompleteType = $verifyCompleteType;
		return $this;
	}
    /** @return TargetCounterModel|null Target Counter */
	public function getTargetCounter(): ?TargetCounterModel {
		return $this->targetCounter;
	}
    /** @param TargetCounterModel|null $targetCounter Target Counter */
	public function setTargetCounter(?TargetCounterModel $targetCounter) {
		$this->targetCounter = $targetCounter;
	}
    /**
     * @param TargetCounterModel|null $targetCounter Target Counter
     * @return MissionTaskModelMaster
     */
	public function withTargetCounter(?TargetCounterModel $targetCounter): MissionTaskModelMaster {
		$this->targetCounter = $targetCounter;
		return $this;
	}
    /** @return array|null Verify Actions when task is accomplished */
	public function getVerifyCompleteConsumeActions(): ?array {
		return $this->verifyCompleteConsumeActions;
	}
    /** @param array|null $verifyCompleteConsumeActions Verify Actions when task is accomplished */
	public function setVerifyCompleteConsumeActions(?array $verifyCompleteConsumeActions) {
		$this->verifyCompleteConsumeActions = $verifyCompleteConsumeActions;
	}
    /**
     * @param array|null $verifyCompleteConsumeActions Verify Actions when task is accomplished
     * @return MissionTaskModelMaster
     */
	public function withVerifyCompleteConsumeActions(?array $verifyCompleteConsumeActions): MissionTaskModelMaster {
		$this->verifyCompleteConsumeActions = $verifyCompleteConsumeActions;
		return $this;
	}
    /** @return array|null Rewards for mission accomplishment */
	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}
    /** @param array|null $completeAcquireActions Rewards for mission accomplishment */
	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}
    /**
     * @param array|null $completeAcquireActions Rewards for mission accomplishment
     * @return MissionTaskModelMaster
     */
	public function withCompleteAcquireActions(?array $completeAcquireActions): MissionTaskModelMaster {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}
    /** @return string|null GS2-Schedule event GRN with a set period of time during which rewards can be received */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId GS2-Schedule event GRN with a set period of time during which rewards can be received */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId GS2-Schedule event GRN with a set period of time during which rewards can be received
     * @return MissionTaskModelMaster
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): MissionTaskModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
    /** @return string|null Name of the task that must be accomplished to attempt this task */
	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}
    /** @param string|null $premiseMissionTaskName Name of the task that must be accomplished to attempt this task */
	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}
    /**
     * @param string|null $premiseMissionTaskName Name of the task that must be accomplished to attempt this task
     * @return MissionTaskModelMaster
     */
	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): MissionTaskModelMaster {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return MissionTaskModelMaster
     */
	public function withCreatedAt(?int $createdAt): MissionTaskModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return MissionTaskModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): MissionTaskModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return MissionTaskModelMaster
     */
	public function withRevision(?int $revision): MissionTaskModelMaster {
		$this->revision = $revision;
		return $this;
	}
    /**
     * @return string|null Counter Model name
     * @deprecated
     */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @deprecated
     */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @return MissionTaskModelMaster
     * @deprecated
     */
	public function withCounterName(?string $counterName): MissionTaskModelMaster {
		$this->counterName = $counterName;
		return $this;
	}
    /**
     * @return string|null Target Reset timing
     * @deprecated
     */
	public function getTargetResetType(): ?string {
		return $this->targetResetType;
	}
    /**
     * @param string|null $targetResetType Target Reset timing
     * @deprecated
     */
	public function setTargetResetType(?string $targetResetType) {
		$this->targetResetType = $targetResetType;
	}
    /**
     * @param string|null $targetResetType Target Reset timing
     * @return MissionTaskModelMaster
     * @deprecated
     */
	public function withTargetResetType(?string $targetResetType): MissionTaskModelMaster {
		$this->targetResetType = $targetResetType;
		return $this;
	}
    /**
     * @return int|null Target value
     * @deprecated
     */
	public function getTargetValue(): ?int {
		return $this->targetValue;
	}
    /**
     * @param int|null $targetValue Target value
     * @deprecated
     */
	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}
    /**
     * @param int|null $targetValue Target value
     * @return MissionTaskModelMaster
     * @deprecated
     */
	public function withTargetValue(?int $targetValue): MissionTaskModelMaster {
		$this->targetValue = $targetValue;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionTaskModelMaster {
        if ($data === null) {
            return null;
        }
        return (new MissionTaskModelMaster())
            ->withMissionTaskId(array_key_exists('missionTaskId', $data) && $data['missionTaskId'] !== null ? $data['missionTaskId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withVerifyCompleteType(array_key_exists('verifyCompleteType', $data) && $data['verifyCompleteType'] !== null ? $data['verifyCompleteType'] : null)
            ->withTargetCounter(array_key_exists('targetCounter', $data) && $data['targetCounter'] !== null ? TargetCounterModel::fromJson($data['targetCounter']) : null)
            ->withVerifyCompleteConsumeActions(!array_key_exists('verifyCompleteConsumeActions', $data) || $data['verifyCompleteConsumeActions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyCompleteConsumeActions']
            ))
            ->withCompleteAcquireActions(!array_key_exists('completeAcquireActions', $data) || $data['completeAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['completeAcquireActions']
            ))
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withPremiseMissionTaskName(array_key_exists('premiseMissionTaskName', $data) && $data['premiseMissionTaskName'] !== null ? $data['premiseMissionTaskName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withTargetResetType(array_key_exists('targetResetType', $data) && $data['targetResetType'] !== null ? $data['targetResetType'] : null)
            ->withTargetValue(array_key_exists('targetValue', $data) && $data['targetValue'] !== null ? $data['targetValue'] : null);
    }

    public function toJson(): array {
        return array(
            "missionTaskId" => $this->getMissionTaskId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "verifyCompleteType" => $this->getVerifyCompleteType(),
            "targetCounter" => $this->getTargetCounter() !== null ? $this->getTargetCounter()->toJson() : null,
            "verifyCompleteConsumeActions" => $this->getVerifyCompleteConsumeActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyCompleteConsumeActions()
            ),
            "completeAcquireActions" => $this->getCompleteAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCompleteAcquireActions()
            ),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "premiseMissionTaskName" => $this->getPremiseMissionTaskName(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
            "counterName" => $this->getCounterName(),
            "targetResetType" => $this->getTargetResetType(),
            "targetValue" => $this->getTargetValue(),
        );
    }
}