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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


class IncrementalRateModelMaster implements IModel {
	/**
     * @var string
	 */
	private $incrementalRateModelId;
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
     * @var ConsumeAction
	 */
	private $consumeAction;
	/**
     * @var string
	 */
	private $calculateType;
	/**
     * @var int
	 */
	private $baseValue;
	/**
     * @var int
	 */
	private $coefficientValue;
	/**
     * @var string
	 */
	private $calculateScriptId;
	/**
     * @var string
	 */
	private $exchangeCountId;
	/**
     * @var int
	 */
	private $maximumExchangeCount;
	/**
     * @var array
	 */
	private $acquireActions;
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
	public function getIncrementalRateModelId(): ?string {
		return $this->incrementalRateModelId;
	}
	public function setIncrementalRateModelId(?string $incrementalRateModelId) {
		$this->incrementalRateModelId = $incrementalRateModelId;
	}
	public function withIncrementalRateModelId(?string $incrementalRateModelId): IncrementalRateModelMaster {
		$this->incrementalRateModelId = $incrementalRateModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): IncrementalRateModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): IncrementalRateModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): IncrementalRateModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getConsumeAction(): ?ConsumeAction {
		return $this->consumeAction;
	}
	public function setConsumeAction(?ConsumeAction $consumeAction) {
		$this->consumeAction = $consumeAction;
	}
	public function withConsumeAction(?ConsumeAction $consumeAction): IncrementalRateModelMaster {
		$this->consumeAction = $consumeAction;
		return $this;
	}
	public function getCalculateType(): ?string {
		return $this->calculateType;
	}
	public function setCalculateType(?string $calculateType) {
		$this->calculateType = $calculateType;
	}
	public function withCalculateType(?string $calculateType): IncrementalRateModelMaster {
		$this->calculateType = $calculateType;
		return $this;
	}
	public function getBaseValue(): ?int {
		return $this->baseValue;
	}
	public function setBaseValue(?int $baseValue) {
		$this->baseValue = $baseValue;
	}
	public function withBaseValue(?int $baseValue): IncrementalRateModelMaster {
		$this->baseValue = $baseValue;
		return $this;
	}
	public function getCoefficientValue(): ?int {
		return $this->coefficientValue;
	}
	public function setCoefficientValue(?int $coefficientValue) {
		$this->coefficientValue = $coefficientValue;
	}
	public function withCoefficientValue(?int $coefficientValue): IncrementalRateModelMaster {
		$this->coefficientValue = $coefficientValue;
		return $this;
	}
	public function getCalculateScriptId(): ?string {
		return $this->calculateScriptId;
	}
	public function setCalculateScriptId(?string $calculateScriptId) {
		$this->calculateScriptId = $calculateScriptId;
	}
	public function withCalculateScriptId(?string $calculateScriptId): IncrementalRateModelMaster {
		$this->calculateScriptId = $calculateScriptId;
		return $this;
	}
	public function getExchangeCountId(): ?string {
		return $this->exchangeCountId;
	}
	public function setExchangeCountId(?string $exchangeCountId) {
		$this->exchangeCountId = $exchangeCountId;
	}
	public function withExchangeCountId(?string $exchangeCountId): IncrementalRateModelMaster {
		$this->exchangeCountId = $exchangeCountId;
		return $this;
	}
	public function getMaximumExchangeCount(): ?int {
		return $this->maximumExchangeCount;
	}
	public function setMaximumExchangeCount(?int $maximumExchangeCount) {
		$this->maximumExchangeCount = $maximumExchangeCount;
	}
	public function withMaximumExchangeCount(?int $maximumExchangeCount): IncrementalRateModelMaster {
		$this->maximumExchangeCount = $maximumExchangeCount;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): IncrementalRateModelMaster {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): IncrementalRateModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): IncrementalRateModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): IncrementalRateModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?IncrementalRateModelMaster {
        if ($data === null) {
            return null;
        }
        return (new IncrementalRateModelMaster())
            ->withIncrementalRateModelId(array_key_exists('incrementalRateModelId', $data) && $data['incrementalRateModelId'] !== null ? $data['incrementalRateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withConsumeAction(array_key_exists('consumeAction', $data) && $data['consumeAction'] !== null ? ConsumeAction::fromJson($data['consumeAction']) : null)
            ->withCalculateType(array_key_exists('calculateType', $data) && $data['calculateType'] !== null ? $data['calculateType'] : null)
            ->withBaseValue(array_key_exists('baseValue', $data) && $data['baseValue'] !== null ? $data['baseValue'] : null)
            ->withCoefficientValue(array_key_exists('coefficientValue', $data) && $data['coefficientValue'] !== null ? $data['coefficientValue'] : null)
            ->withCalculateScriptId(array_key_exists('calculateScriptId', $data) && $data['calculateScriptId'] !== null ? $data['calculateScriptId'] : null)
            ->withExchangeCountId(array_key_exists('exchangeCountId', $data) && $data['exchangeCountId'] !== null ? $data['exchangeCountId'] : null)
            ->withMaximumExchangeCount(array_key_exists('maximumExchangeCount', $data) && $data['maximumExchangeCount'] !== null ? $data['maximumExchangeCount'] : null)
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "incrementalRateModelId" => $this->getIncrementalRateModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "consumeAction" => $this->getConsumeAction() !== null ? $this->getConsumeAction()->toJson() : null,
            "calculateType" => $this->getCalculateType(),
            "baseValue" => $this->getBaseValue(),
            "coefficientValue" => $this->getCoefficientValue(),
            "calculateScriptId" => $this->getCalculateScriptId(),
            "exchangeCountId" => $this->getExchangeCountId(),
            "maximumExchangeCount" => $this->getMaximumExchangeCount(),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}