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

namespace Gs2\Enchant\Model;

use Gs2\Core\Model\IModel;


/**
 * Balance Parameter Model Master
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#balanceparametermodelmaster
 */
class BalanceParameterModelMaster implements IModel {
	/**
     * @var string Balance Parameter Model GRN
	 */
	private $balanceParameterModelId;
	/**
     * @var string Balance Parameter Model name
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
     * @var int Total value
	 */
	private $totalValue;
	/**
     * @var string Initial value setting policy
	 */
	private $initialValueStrategy;
	/**
     * @var array Balance parameter value model list
	 */
	private $parameters;
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
    /** @return string|null Balance Parameter Model GRN */
	public function getBalanceParameterModelId(): ?string {
		return $this->balanceParameterModelId;
	}
    /** @param string|null $balanceParameterModelId Balance Parameter Model GRN */
	public function setBalanceParameterModelId(?string $balanceParameterModelId) {
		$this->balanceParameterModelId = $balanceParameterModelId;
	}
    /**
     * @param string|null $balanceParameterModelId Balance Parameter Model GRN
     * @return BalanceParameterModelMaster
     */
	public function withBalanceParameterModelId(?string $balanceParameterModelId): BalanceParameterModelMaster {
		$this->balanceParameterModelId = $balanceParameterModelId;
		return $this;
	}
    /** @return string|null Balance Parameter Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Balance Parameter Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Balance Parameter Model name
     * @return BalanceParameterModelMaster
     */
	public function withName(?string $name): BalanceParameterModelMaster {
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
     * @return BalanceParameterModelMaster
     */
	public function withDescription(?string $description): BalanceParameterModelMaster {
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
     * @return BalanceParameterModelMaster
     */
	public function withMetadata(?string $metadata): BalanceParameterModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Total value */
	public function getTotalValue(): ?int {
		return $this->totalValue;
	}
    /** @param int|null $totalValue Total value */
	public function setTotalValue(?int $totalValue) {
		$this->totalValue = $totalValue;
	}
    /**
     * @param int|null $totalValue Total value
     * @return BalanceParameterModelMaster
     */
	public function withTotalValue(?int $totalValue): BalanceParameterModelMaster {
		$this->totalValue = $totalValue;
		return $this;
	}
    /** @return string|null Initial value setting policy */
	public function getInitialValueStrategy(): ?string {
		return $this->initialValueStrategy;
	}
    /** @param string|null $initialValueStrategy Initial value setting policy */
	public function setInitialValueStrategy(?string $initialValueStrategy) {
		$this->initialValueStrategy = $initialValueStrategy;
	}
    /**
     * @param string|null $initialValueStrategy Initial value setting policy
     * @return BalanceParameterModelMaster
     */
	public function withInitialValueStrategy(?string $initialValueStrategy): BalanceParameterModelMaster {
		$this->initialValueStrategy = $initialValueStrategy;
		return $this;
	}
    /** @return array|null Balance parameter value model list */
	public function getParameters(): ?array {
		return $this->parameters;
	}
    /** @param array|null $parameters Balance parameter value model list */
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
    /**
     * @param array|null $parameters Balance parameter value model list
     * @return BalanceParameterModelMaster
     */
	public function withParameters(?array $parameters): BalanceParameterModelMaster {
		$this->parameters = $parameters;
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
     * @return BalanceParameterModelMaster
     */
	public function withCreatedAt(?int $createdAt): BalanceParameterModelMaster {
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
     * @return BalanceParameterModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): BalanceParameterModelMaster {
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
     * @return BalanceParameterModelMaster
     */
	public function withRevision(?int $revision): BalanceParameterModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BalanceParameterModelMaster {
        if ($data === null) {
            return null;
        }
        return (new BalanceParameterModelMaster())
            ->withBalanceParameterModelId(array_key_exists('balanceParameterModelId', $data) && $data['balanceParameterModelId'] !== null ? $data['balanceParameterModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTotalValue(array_key_exists('totalValue', $data) && $data['totalValue'] !== null ? $data['totalValue'] : null)
            ->withInitialValueStrategy(array_key_exists('initialValueStrategy', $data) && $data['initialValueStrategy'] !== null ? $data['initialValueStrategy'] : null)
            ->withParameters(!array_key_exists('parameters', $data) || $data['parameters'] === null ? null : array_map(
                function ($item) {
                    return BalanceParameterValueModel::fromJson($item);
                },
                $data['parameters']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "balanceParameterModelId" => $this->getBalanceParameterModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "totalValue" => $this->getTotalValue(),
            "initialValueStrategy" => $this->getInitialValueStrategy(),
            "parameters" => $this->getParameters() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameters()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}