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


class BuffEntryModelMaster implements IModel {
	/**
     * @var string
	 */
	private $buffEntryModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $expression;
	/**
     * @var string
	 */
	private $targetType;
	/**
     * @var BuffTargetModel
	 */
	private $targetModel;
	/**
     * @var BuffTargetAction
	 */
	private $targetAction;
	/**
     * @var int
	 */
	private $priority;
	/**
     * @var string
	 */
	private $applyPeriodScheduleEventId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getBuffEntryModelId(): ?string {
		return $this->buffEntryModelId;
	}
	public function setBuffEntryModelId(?string $buffEntryModelId) {
		$this->buffEntryModelId = $buffEntryModelId;
	}
	public function withBuffEntryModelId(?string $buffEntryModelId): BuffEntryModelMaster {
		$this->buffEntryModelId = $buffEntryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BuffEntryModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): BuffEntryModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): BuffEntryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getExpression(): ?string {
		return $this->expression;
	}
	public function setExpression(?string $expression) {
		$this->expression = $expression;
	}
	public function withExpression(?string $expression): BuffEntryModelMaster {
		$this->expression = $expression;
		return $this;
	}
	public function getTargetType(): ?string {
		return $this->targetType;
	}
	public function setTargetType(?string $targetType) {
		$this->targetType = $targetType;
	}
	public function withTargetType(?string $targetType): BuffEntryModelMaster {
		$this->targetType = $targetType;
		return $this;
	}
	public function getTargetModel(): ?BuffTargetModel {
		return $this->targetModel;
	}
	public function setTargetModel(?BuffTargetModel $targetModel) {
		$this->targetModel = $targetModel;
	}
	public function withTargetModel(?BuffTargetModel $targetModel): BuffEntryModelMaster {
		$this->targetModel = $targetModel;
		return $this;
	}
	public function getTargetAction(): ?BuffTargetAction {
		return $this->targetAction;
	}
	public function setTargetAction(?BuffTargetAction $targetAction) {
		$this->targetAction = $targetAction;
	}
	public function withTargetAction(?BuffTargetAction $targetAction): BuffEntryModelMaster {
		$this->targetAction = $targetAction;
		return $this;
	}
	public function getPriority(): ?int {
		return $this->priority;
	}
	public function setPriority(?int $priority) {
		$this->priority = $priority;
	}
	public function withPriority(?int $priority): BuffEntryModelMaster {
		$this->priority = $priority;
		return $this;
	}
	public function getApplyPeriodScheduleEventId(): ?string {
		return $this->applyPeriodScheduleEventId;
	}
	public function setApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId) {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
	}
	public function withApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId): BuffEntryModelMaster {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): BuffEntryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): BuffEntryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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