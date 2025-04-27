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


class BalanceParameterModel implements IModel {
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
	public function getBalanceParameterModelId(): ?string {
		return $this->balanceParameterModelId;
	}
	public function setBalanceParameterModelId(?string $balanceParameterModelId) {
		$this->balanceParameterModelId = $balanceParameterModelId;
	}
	public function withBalanceParameterModelId(?string $balanceParameterModelId): BalanceParameterModel {
		$this->balanceParameterModelId = $balanceParameterModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BalanceParameterModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): BalanceParameterModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTotalValue(): ?int {
		return $this->totalValue;
	}
	public function setTotalValue(?int $totalValue) {
		$this->totalValue = $totalValue;
	}
	public function withTotalValue(?int $totalValue): BalanceParameterModel {
		$this->totalValue = $totalValue;
		return $this;
	}
	public function getInitialValueStrategy(): ?string {
		return $this->initialValueStrategy;
	}
	public function setInitialValueStrategy(?string $initialValueStrategy) {
		$this->initialValueStrategy = $initialValueStrategy;
	}
	public function withInitialValueStrategy(?string $initialValueStrategy): BalanceParameterModel {
		$this->initialValueStrategy = $initialValueStrategy;
		return $this;
	}
	public function getParameters(): ?array {
		return $this->parameters;
	}
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
	public function withParameters(?array $parameters): BalanceParameterModel {
		$this->parameters = $parameters;
		return $this;
	}

    public static function fromJson(?array $data): ?BalanceParameterModel {
        if ($data === null) {
            return null;
        }
        return (new BalanceParameterModel())
            ->withBalanceParameterModelId(array_key_exists('balanceParameterModelId', $data) && $data['balanceParameterModelId'] !== null ? $data['balanceParameterModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTotalValue(array_key_exists('totalValue', $data) && $data['totalValue'] !== null ? $data['totalValue'] : null)
            ->withInitialValueStrategy(array_key_exists('initialValueStrategy', $data) && $data['initialValueStrategy'] !== null ? $data['initialValueStrategy'] : null)
            ->withParameters(!array_key_exists('parameters', $data) || $data['parameters'] === null ? null : array_map(
                function ($item) {
                    return BalanceParameterValueModel::fromJson($item);
                },
                $data['parameters']
            ));
    }

    public function toJson(): array {
        return array(
            "balanceParameterModelId" => $this->getBalanceParameterModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "totalValue" => $this->getTotalValue(),
            "initialValueStrategy" => $this->getInitialValueStrategy(),
            "parameters" => $this->getParameters() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameters()
            ),
        );
    }
}