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

namespace Gs2\Buff\Model;

use Gs2\Core\Model\IModel;


/**
 * Buff Entry Model Master
 *
 * @see https://docs.gs2.io/api_reference/buff/sdk/#buffentrymodelmaster
 */
class BuffEntryModelMaster implements IModel {
	/**
     * @var string Buff Entry Model Master GRN
	 */
	private $buffEntryModelId;
	/**
     * @var string Buff Entry Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Application type of buff
	 */
	private $expression;
	/**
     * @var string Type of target to apply buff
	 */
	private $targetType;
	/**
     * @var BuffTargetModel Model to apply buff
	 */
	private $targetModel;
	/**
     * @var BuffTargetAction Action to apply buff
	 */
	private $targetAction;
	/**
     * @var int Priority of buff application
	 */
	private $priority;
	/**
     * @var string Event period GRN to apply buff
	 */
	private $applyPeriodScheduleEventId;
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
    /** @return string|null Buff Entry Model Master GRN */
	public function getBuffEntryModelId(): ?string {
		return $this->buffEntryModelId;
	}
    /** @param string|null $buffEntryModelId Buff Entry Model Master GRN */
	public function setBuffEntryModelId(?string $buffEntryModelId) {
		$this->buffEntryModelId = $buffEntryModelId;
	}
    /**
     * @param string|null $buffEntryModelId Buff Entry Model Master GRN
     * @return BuffEntryModelMaster
     */
	public function withBuffEntryModelId(?string $buffEntryModelId): BuffEntryModelMaster {
		$this->buffEntryModelId = $buffEntryModelId;
		return $this;
	}
    /** @return string|null Buff Entry Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Buff Entry Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Buff Entry Model name
     * @return BuffEntryModelMaster
     */
	public function withName(?string $name): BuffEntryModelMaster {
		$this->name = $name;
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
     * @return BuffEntryModelMaster
     */
	public function withDescription(?string $description): BuffEntryModelMaster {
		$this->description = $description;
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
     * @return BuffEntryModelMaster
     */
	public function withMetadata(?string $metadata): BuffEntryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Application type of buff */
	public function getExpression(): ?string {
		return $this->expression;
	}
    /** @param string|null $expression Application type of buff */
	public function setExpression(?string $expression) {
		$this->expression = $expression;
	}
    /**
     * @param string|null $expression Application type of buff
     * @return BuffEntryModelMaster
     */
	public function withExpression(?string $expression): BuffEntryModelMaster {
		$this->expression = $expression;
		return $this;
	}
    /** @return string|null Type of target to apply buff */
	public function getTargetType(): ?string {
		return $this->targetType;
	}
    /** @param string|null $targetType Type of target to apply buff */
	public function setTargetType(?string $targetType) {
		$this->targetType = $targetType;
	}
    /**
     * @param string|null $targetType Type of target to apply buff
     * @return BuffEntryModelMaster
     */
	public function withTargetType(?string $targetType): BuffEntryModelMaster {
		$this->targetType = $targetType;
		return $this;
	}
    /** @return BuffTargetModel|null Model to apply buff */
	public function getTargetModel(): ?BuffTargetModel {
		return $this->targetModel;
	}
    /** @param BuffTargetModel|null $targetModel Model to apply buff */
	public function setTargetModel(?BuffTargetModel $targetModel) {
		$this->targetModel = $targetModel;
	}
    /**
     * @param BuffTargetModel|null $targetModel Model to apply buff
     * @return BuffEntryModelMaster
     */
	public function withTargetModel(?BuffTargetModel $targetModel): BuffEntryModelMaster {
		$this->targetModel = $targetModel;
		return $this;
	}
    /** @return BuffTargetAction|null Action to apply buff */
	public function getTargetAction(): ?BuffTargetAction {
		return $this->targetAction;
	}
    /** @param BuffTargetAction|null $targetAction Action to apply buff */
	public function setTargetAction(?BuffTargetAction $targetAction) {
		$this->targetAction = $targetAction;
	}
    /**
     * @param BuffTargetAction|null $targetAction Action to apply buff
     * @return BuffEntryModelMaster
     */
	public function withTargetAction(?BuffTargetAction $targetAction): BuffEntryModelMaster {
		$this->targetAction = $targetAction;
		return $this;
	}
    /** @return int|null Priority of buff application */
	public function getPriority(): ?int {
		return $this->priority;
	}
    /** @param int|null $priority Priority of buff application */
	public function setPriority(?int $priority) {
		$this->priority = $priority;
	}
    /**
     * @param int|null $priority Priority of buff application
     * @return BuffEntryModelMaster
     */
	public function withPriority(?int $priority): BuffEntryModelMaster {
		$this->priority = $priority;
		return $this;
	}
    /** @return string|null Event period GRN to apply buff */
	public function getApplyPeriodScheduleEventId(): ?string {
		return $this->applyPeriodScheduleEventId;
	}
    /** @param string|null $applyPeriodScheduleEventId Event period GRN to apply buff */
	public function setApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId) {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
	}
    /**
     * @param string|null $applyPeriodScheduleEventId Event period GRN to apply buff
     * @return BuffEntryModelMaster
     */
	public function withApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId): BuffEntryModelMaster {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
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
     * @return BuffEntryModelMaster
     */
	public function withCreatedAt(?int $createdAt): BuffEntryModelMaster {
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
     * @return BuffEntryModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): BuffEntryModelMaster {
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
     * @return BuffEntryModelMaster
     */
	public function withRevision(?int $revision): BuffEntryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BuffEntryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new BuffEntryModelMaster())
            ->withBuffEntryModelId(array_key_exists('buffEntryModelId', $data) && $data['buffEntryModelId'] !== null ? $data['buffEntryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExpression(array_key_exists('expression', $data) && $data['expression'] !== null ? $data['expression'] : null)
            ->withTargetType(array_key_exists('targetType', $data) && $data['targetType'] !== null ? $data['targetType'] : null)
            ->withTargetModel(array_key_exists('targetModel', $data) && $data['targetModel'] !== null ? BuffTargetModel::fromJson($data['targetModel']) : null)
            ->withTargetAction(array_key_exists('targetAction', $data) && $data['targetAction'] !== null ? BuffTargetAction::fromJson($data['targetAction']) : null)
            ->withPriority(array_key_exists('priority', $data) && $data['priority'] !== null ? $data['priority'] : null)
            ->withApplyPeriodScheduleEventId(array_key_exists('applyPeriodScheduleEventId', $data) && $data['applyPeriodScheduleEventId'] !== null ? $data['applyPeriodScheduleEventId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "buffEntryModelId" => $this->getBuffEntryModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "expression" => $this->getExpression(),
            "targetType" => $this->getTargetType(),
            "targetModel" => $this->getTargetModel() !== null ? $this->getTargetModel()->toJson() : null,
            "targetAction" => $this->getTargetAction() !== null ? $this->getTargetAction()->toJson() : null,
            "priority" => $this->getPriority(),
            "applyPeriodScheduleEventId" => $this->getApplyPeriodScheduleEventId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}