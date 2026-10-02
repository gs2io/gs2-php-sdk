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


/**
 * Incremental Cost Exchange Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#incrementalratemodelmaster
 */
class IncrementalRateModelMaster implements IModel {
	/**
     * @var string Incremental Cost Exchange Rate Model Master GRN
	 */
	private $incrementalRateModelId;
	/**
     * @var string Incremental Cost Exchange Rate Model name
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
     * @var ConsumeAction Consume Action (Quantity and Value are overwritten automatically)
	 */
	private $consumeAction;
	/**
     * @var string Calculation method for cost increase amount
	 */
	private $calculateType;
	/**
     * @var int Base Value
	 */
	private $baseValue;
	/**
     * @var int Coefficient Value
	 */
	private $coefficientValue;
	/**
     * @var string GRN of cost calculation script
	 */
	private $calculateScriptId;
	/**
     * @var string GS2-Limit Usage Limit Model GRN for managing exchange execution counts
	 */
	private $exchangeCountId;
	/**
     * @var int Maximum number of exchanges
	 */
	private $maximumExchangeCount;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
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
    /** @return string|null Incremental Cost Exchange Rate Model Master GRN */
	public function getIncrementalRateModelId(): ?string {
		return $this->incrementalRateModelId;
	}
    /** @param string|null $incrementalRateModelId Incremental Cost Exchange Rate Model Master GRN */
	public function setIncrementalRateModelId(?string $incrementalRateModelId) {
		$this->incrementalRateModelId = $incrementalRateModelId;
	}
    /**
     * @param string|null $incrementalRateModelId Incremental Cost Exchange Rate Model Master GRN
     * @return IncrementalRateModelMaster
     */
	public function withIncrementalRateModelId(?string $incrementalRateModelId): IncrementalRateModelMaster {
		$this->incrementalRateModelId = $incrementalRateModelId;
		return $this;
	}
    /** @return string|null Incremental Cost Exchange Rate Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Incremental Cost Exchange Rate Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Incremental Cost Exchange Rate Model name
     * @return IncrementalRateModelMaster
     */
	public function withName(?string $name): IncrementalRateModelMaster {
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
     * @return IncrementalRateModelMaster
     */
	public function withDescription(?string $description): IncrementalRateModelMaster {
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
     * @return IncrementalRateModelMaster
     */
	public function withMetadata(?string $metadata): IncrementalRateModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return ConsumeAction|null Consume Action (Quantity and Value are overwritten automatically) */
	public function getConsumeAction(): ?ConsumeAction {
		return $this->consumeAction;
	}
    /** @param ConsumeAction|null $consumeAction Consume Action (Quantity and Value are overwritten automatically) */
	public function setConsumeAction(?ConsumeAction $consumeAction) {
		$this->consumeAction = $consumeAction;
	}
    /**
     * @param ConsumeAction|null $consumeAction Consume Action (Quantity and Value are overwritten automatically)
     * @return IncrementalRateModelMaster
     */
	public function withConsumeAction(?ConsumeAction $consumeAction): IncrementalRateModelMaster {
		$this->consumeAction = $consumeAction;
		return $this;
	}
    /** @return string|null Calculation method for cost increase amount */
	public function getCalculateType(): ?string {
		return $this->calculateType;
	}
    /** @param string|null $calculateType Calculation method for cost increase amount */
	public function setCalculateType(?string $calculateType) {
		$this->calculateType = $calculateType;
	}
    /**
     * @param string|null $calculateType Calculation method for cost increase amount
     * @return IncrementalRateModelMaster
     */
	public function withCalculateType(?string $calculateType): IncrementalRateModelMaster {
		$this->calculateType = $calculateType;
		return $this;
	}
    /** @return int|null Base Value */
	public function getBaseValue(): ?int {
		return $this->baseValue;
	}
    /** @param int|null $baseValue Base Value */
	public function setBaseValue(?int $baseValue) {
		$this->baseValue = $baseValue;
	}
    /**
     * @param int|null $baseValue Base Value
     * @return IncrementalRateModelMaster
     */
	public function withBaseValue(?int $baseValue): IncrementalRateModelMaster {
		$this->baseValue = $baseValue;
		return $this;
	}
    /** @return int|null Coefficient Value */
	public function getCoefficientValue(): ?int {
		return $this->coefficientValue;
	}
    /** @param int|null $coefficientValue Coefficient Value */
	public function setCoefficientValue(?int $coefficientValue) {
		$this->coefficientValue = $coefficientValue;
	}
    /**
     * @param int|null $coefficientValue Coefficient Value
     * @return IncrementalRateModelMaster
     */
	public function withCoefficientValue(?int $coefficientValue): IncrementalRateModelMaster {
		$this->coefficientValue = $coefficientValue;
		return $this;
	}
    /** @return string|null GRN of cost calculation script */
	public function getCalculateScriptId(): ?string {
		return $this->calculateScriptId;
	}
    /** @param string|null $calculateScriptId GRN of cost calculation script */
	public function setCalculateScriptId(?string $calculateScriptId) {
		$this->calculateScriptId = $calculateScriptId;
	}
    /**
     * @param string|null $calculateScriptId GRN of cost calculation script
     * @return IncrementalRateModelMaster
     */
	public function withCalculateScriptId(?string $calculateScriptId): IncrementalRateModelMaster {
		$this->calculateScriptId = $calculateScriptId;
		return $this;
	}
    /** @return string|null GS2-Limit Usage Limit Model GRN for managing exchange execution counts */
	public function getExchangeCountId(): ?string {
		return $this->exchangeCountId;
	}
    /** @param string|null $exchangeCountId GS2-Limit Usage Limit Model GRN for managing exchange execution counts */
	public function setExchangeCountId(?string $exchangeCountId) {
		$this->exchangeCountId = $exchangeCountId;
	}
    /**
     * @param string|null $exchangeCountId GS2-Limit Usage Limit Model GRN for managing exchange execution counts
     * @return IncrementalRateModelMaster
     */
	public function withExchangeCountId(?string $exchangeCountId): IncrementalRateModelMaster {
		$this->exchangeCountId = $exchangeCountId;
		return $this;
	}
    /** @return int|null Maximum number of exchanges */
	public function getMaximumExchangeCount(): ?int {
		return $this->maximumExchangeCount;
	}
    /** @param int|null $maximumExchangeCount Maximum number of exchanges */
	public function setMaximumExchangeCount(?int $maximumExchangeCount) {
		$this->maximumExchangeCount = $maximumExchangeCount;
	}
    /**
     * @param int|null $maximumExchangeCount Maximum number of exchanges
     * @return IncrementalRateModelMaster
     */
	public function withMaximumExchangeCount(?int $maximumExchangeCount): IncrementalRateModelMaster {
		$this->maximumExchangeCount = $maximumExchangeCount;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return IncrementalRateModelMaster
     */
	public function withAcquireActions(?array $acquireActions): IncrementalRateModelMaster {
		$this->acquireActions = $acquireActions;
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
     * @return IncrementalRateModelMaster
     */
	public function withCreatedAt(?int $createdAt): IncrementalRateModelMaster {
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
     * @return IncrementalRateModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): IncrementalRateModelMaster {
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
     * @return IncrementalRateModelMaster
     */
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
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
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
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}