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
 * Mission Task Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#missiontaskmodel
 */
class MissionTaskModel implements IModel {
	/**
     * @var string Mission Task GRN
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
    /** @return string|null Mission Task GRN */
	public function getMissionTaskId(): ?string {
		return $this->missionTaskId;
	}
    /** @param string|null $missionTaskId Mission Task GRN */
	public function setMissionTaskId(?string $missionTaskId) {
		$this->missionTaskId = $missionTaskId;
	}
    /**
     * @param string|null $missionTaskId Mission Task GRN
     * @return MissionTaskModel
     */
	public function withMissionTaskId(?string $missionTaskId): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withName(?string $name): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withMetadata(?string $metadata): MissionTaskModel {
		$this->metadata = $metadata;
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
     * @return MissionTaskModel
     */
	public function withVerifyCompleteType(?string $verifyCompleteType): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withTargetCounter(?TargetCounterModel $targetCounter): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withVerifyCompleteConsumeActions(?array $verifyCompleteConsumeActions): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withCompleteAcquireActions(?array $completeAcquireActions): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): MissionTaskModel {
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
     * @return MissionTaskModel
     */
	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): MissionTaskModel {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
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
     * @return MissionTaskModel
     * @deprecated
     */
	public function withCounterName(?string $counterName): MissionTaskModel {
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
     * @return MissionTaskModel
     * @deprecated
     */
	public function withTargetResetType(?string $targetResetType): MissionTaskModel {
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
     * @return MissionTaskModel
     * @deprecated
     */
	public function withTargetValue(?int $targetValue): MissionTaskModel {
		$this->targetValue = $targetValue;
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
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withTargetResetType(array_key_exists('targetResetType', $data) && $data['targetResetType'] !== null ? $data['targetResetType'] : null)
            ->withTargetValue(array_key_exists('targetValue', $data) && $data['targetValue'] !== null ? $data['targetValue'] : null);
    }

    public function toJson(): array {
        return array(
            "missionTaskId" => $this->getMissionTaskId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
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
            "counterName" => $this->getCounterName(),
            "targetResetType" => $this->getTargetResetType(),
            "targetValue" => $this->getTargetValue(),
        );
    }
}