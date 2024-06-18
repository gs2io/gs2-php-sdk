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

namespace Gs2\Buff\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Buff\Model\BuffTargetGrn;
use Gs2\Buff\Model\BuffTargetModel;
use Gs2\Buff\Model\BuffTargetAction;

class UpdateBuffEntryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $buffEntryName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $expression;
    /** @var string */
    private $targetType;
    /** @var BuffTargetModel */
    private $targetModel;
    /** @var BuffTargetAction */
    private $targetAction;
    /** @var int */
    private $priority;
    /** @var string */
    private $applyPeriodScheduleEventId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateBuffEntryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBuffEntryName(): ?string {
		return $this->buffEntryName;
	}
	public function setBuffEntryName(?string $buffEntryName) {
		$this->buffEntryName = $buffEntryName;
	}
	public function withBuffEntryName(?string $buffEntryName): UpdateBuffEntryModelMasterRequest {
		$this->buffEntryName = $buffEntryName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateBuffEntryModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateBuffEntryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getExpression(): ?string {
		return $this->expression;
	}
	public function setExpression(?string $expression) {
		$this->expression = $expression;
	}
	public function withExpression(?string $expression): UpdateBuffEntryModelMasterRequest {
		$this->expression = $expression;
		return $this;
	}
	public function getTargetType(): ?string {
		return $this->targetType;
	}
	public function setTargetType(?string $targetType) {
		$this->targetType = $targetType;
	}
	public function withTargetType(?string $targetType): UpdateBuffEntryModelMasterRequest {
		$this->targetType = $targetType;
		return $this;
	}
	public function getTargetModel(): ?BuffTargetModel {
		return $this->targetModel;
	}
	public function setTargetModel(?BuffTargetModel $targetModel) {
		$this->targetModel = $targetModel;
	}
	public function withTargetModel(?BuffTargetModel $targetModel): UpdateBuffEntryModelMasterRequest {
		$this->targetModel = $targetModel;
		return $this;
	}
	public function getTargetAction(): ?BuffTargetAction {
		return $this->targetAction;
	}
	public function setTargetAction(?BuffTargetAction $targetAction) {
		$this->targetAction = $targetAction;
	}
	public function withTargetAction(?BuffTargetAction $targetAction): UpdateBuffEntryModelMasterRequest {
		$this->targetAction = $targetAction;
		return $this;
	}
	public function getPriority(): ?int {
		return $this->priority;
	}
	public function setPriority(?int $priority) {
		$this->priority = $priority;
	}
	public function withPriority(?int $priority): UpdateBuffEntryModelMasterRequest {
		$this->priority = $priority;
		return $this;
	}
	public function getApplyPeriodScheduleEventId(): ?string {
		return $this->applyPeriodScheduleEventId;
	}
	public function setApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId) {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
	}
	public function withApplyPeriodScheduleEventId(?string $applyPeriodScheduleEventId): UpdateBuffEntryModelMasterRequest {
		$this->applyPeriodScheduleEventId = $applyPeriodScheduleEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBuffEntryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBuffEntryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBuffEntryName(array_key_exists('buffEntryName', $data) && $data['buffEntryName'] !== null ? $data['buffEntryName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExpression(array_key_exists('expression', $data) && $data['expression'] !== null ? $data['expression'] : null)
            ->withTargetType(array_key_exists('targetType', $data) && $data['targetType'] !== null ? $data['targetType'] : null)
            ->withTargetModel(array_key_exists('targetModel', $data) && $data['targetModel'] !== null ? BuffTargetModel::fromJson($data['targetModel']) : null)
            ->withTargetAction(array_key_exists('targetAction', $data) && $data['targetAction'] !== null ? BuffTargetAction::fromJson($data['targetAction']) : null)
            ->withPriority(array_key_exists('priority', $data) && $data['priority'] !== null ? $data['priority'] : null)
            ->withApplyPeriodScheduleEventId(array_key_exists('applyPeriodScheduleEventId', $data) && $data['applyPeriodScheduleEventId'] !== null ? $data['applyPeriodScheduleEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "buffEntryName" => $this->getBuffEntryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "expression" => $this->getExpression(),
            "targetType" => $this->getTargetType(),
            "targetModel" => $this->getTargetModel() !== null ? $this->getTargetModel()->toJson() : null,
            "targetAction" => $this->getTargetAction() !== null ? $this->getTargetAction()->toJson() : null,
            "priority" => $this->getPriority(),
            "applyPeriodScheduleEventId" => $this->getApplyPeriodScheduleEventId(),
        );
    }
}