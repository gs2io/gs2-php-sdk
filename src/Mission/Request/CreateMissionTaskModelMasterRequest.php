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
use Gs2\Mission\Model\TargetCounterModel;
use Gs2\Mission\Model\VerifyAction;
use Gs2\Mission\Model\AcquireAction;

class CreateMissionTaskModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $name;
    /** @var string */
    private $metadata;
    /** @var string */
    private $description;
    /** @var string */
    private $verifyCompleteType;
    /** @var TargetCounterModel */
    private $targetCounter;
    /** @var array */
    private $verifyCompleteConsumeActions;
    /** @var array */
    private $completeAcquireActions;
    /** @var string */
    private $challengePeriodEventId;
    /** @var string */
    private $premiseMissionTaskName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $targetResetType;
    /** @var int */
    private $targetValue;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateMissionTaskModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
	public function withMissionGroupName(?string $missionGroupName): CreateMissionTaskModelMasterRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateMissionTaskModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateMissionTaskModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateMissionTaskModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getVerifyCompleteType(): ?string {
		return $this->verifyCompleteType;
	}
	public function setVerifyCompleteType(?string $verifyCompleteType) {
		$this->verifyCompleteType = $verifyCompleteType;
	}
	public function withVerifyCompleteType(?string $verifyCompleteType): CreateMissionTaskModelMasterRequest {
		$this->verifyCompleteType = $verifyCompleteType;
		return $this;
	}
	public function getTargetCounter(): ?TargetCounterModel {
		return $this->targetCounter;
	}
	public function setTargetCounter(?TargetCounterModel $targetCounter) {
		$this->targetCounter = $targetCounter;
	}
	public function withTargetCounter(?TargetCounterModel $targetCounter): CreateMissionTaskModelMasterRequest {
		$this->targetCounter = $targetCounter;
		return $this;
	}
	public function getVerifyCompleteConsumeActions(): ?array {
		return $this->verifyCompleteConsumeActions;
	}
	public function setVerifyCompleteConsumeActions(?array $verifyCompleteConsumeActions) {
		$this->verifyCompleteConsumeActions = $verifyCompleteConsumeActions;
	}
	public function withVerifyCompleteConsumeActions(?array $verifyCompleteConsumeActions): CreateMissionTaskModelMasterRequest {
		$this->verifyCompleteConsumeActions = $verifyCompleteConsumeActions;
		return $this;
	}
	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}
	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}
	public function withCompleteAcquireActions(?array $completeAcquireActions): CreateMissionTaskModelMasterRequest {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CreateMissionTaskModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}
	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}
	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): CreateMissionTaskModelMasterRequest {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /**
     * @deprecated
     */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @deprecated
     */
	public function withCounterName(?string $counterName): CreateMissionTaskModelMasterRequest {
		$this->counterName = $counterName;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getTargetResetType(): ?string {
		return $this->targetResetType;
	}
    /**
     * @deprecated
     */
	public function setTargetResetType(?string $targetResetType) {
		$this->targetResetType = $targetResetType;
	}
    /**
     * @deprecated
     */
	public function withTargetResetType(?string $targetResetType): CreateMissionTaskModelMasterRequest {
		$this->targetResetType = $targetResetType;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getTargetValue(): ?int {
		return $this->targetValue;
	}
    /**
     * @deprecated
     */
	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}
    /**
     * @deprecated
     */
	public function withTargetValue(?int $targetValue): CreateMissionTaskModelMasterRequest {
		$this->targetValue = $targetValue;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateMissionTaskModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateMissionTaskModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
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
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withTargetResetType(array_key_exists('targetResetType', $data) && $data['targetResetType'] !== null ? $data['targetResetType'] : null)
            ->withTargetValue(array_key_exists('targetValue', $data) && $data['targetValue'] !== null ? $data['targetValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
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
            "counterName" => $this->getCounterName(),
            "targetResetType" => $this->getTargetResetType(),
            "targetValue" => $this->getTargetValue(),
        );
    }
}