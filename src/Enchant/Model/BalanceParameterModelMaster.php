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


class BalanceParameterModelMaster implements IModel {
	/**
     * @var string
	 */
	private $balanceParameterModelId;
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
     * @var int
	 */
	private $totalValue;
	/**
     * @var string
	 */
	private $initialValueStrategy;
	/**
     * @var array
	 */
	private $parameters;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getBalanceParameterModelId(): ?string {
		return $this->balanceParameterModelId;
	}
	public function setBalanceParameterModelId(?string $balanceParameterModelId) {
		$this->balanceParameterModelId = $balanceParameterModelId;
	}
	public function withBalanceParameterModelId(?string $balanceParameterModelId): BalanceParameterModelMaster {
		$this->balanceParameterModelId = $balanceParameterModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BalanceParameterModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): BalanceParameterModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): BalanceParameterModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTotalValue(): ?int {
		return $this->totalValue;
	}
	public function setTotalValue(?int $totalValue) {
		$this->totalValue = $totalValue;
	}
	public function withTotalValue(?int $totalValue): BalanceParameterModelMaster {
		$this->totalValue = $totalValue;
		return $this;
	}
	public function getInitialValueStrategy(): ?string {
		return $this->initialValueStrategy;
	}
	public function setInitialValueStrategy(?string $initialValueStrategy) {
		$this->initialValueStrategy = $initialValueStrategy;
	}
	public function withInitialValueStrategy(?string $initialValueStrategy): BalanceParameterModelMaster {
		$this->initialValueStrategy = $initialValueStrategy;
		return $this;
	}
	public function getParameters(): ?array {
		return $this->parameters;
	}
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
	public function withParameters(?array $parameters): BalanceParameterModelMaster {
		$this->parameters = $parameters;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): BalanceParameterModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): BalanceParameterModelMaster {
		$this->updatedAt = $updatedAt;
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
            ->withParameters(array_map(
                function ($item) {
                    return BalanceParameterValueModel::fromJson($item);
                },
                array_key_exists('parameters', $data) && $data['parameters'] !== null ? $data['parameters'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "balanceParameterModelId" => $this->getBalanceParameterModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "totalValue" => $this->getTotalValue(),
            "initialValueStrategy" => $this->getInitialValueStrategy(),
            "parameters" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameters() !== null && $this->getParameters() !== null ? $this->getParameters() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}