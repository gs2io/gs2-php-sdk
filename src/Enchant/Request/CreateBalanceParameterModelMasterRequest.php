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

namespace Gs2\Enchant\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enchant\Model\BalanceParameterValueModel;

/**
 * Request for createBalanceParameterModelMaster: Create Balance Parameter Model Master
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#createbalanceparametermodelmaster
 */
class CreateBalanceParameterModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Balance Parameter Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Total value */
    private $totalValue;
    /** @var string Initial value setting policy */
    private $initialValueStrategy;
    /** @var array Balance parameter value model list */
    private $parameters;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateBalanceParameterModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withName(?string $name): CreateBalanceParameterModelMasterRequest {
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withDescription(?string $description): CreateBalanceParameterModelMasterRequest {
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateBalanceParameterModelMasterRequest {
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withTotalValue(?int $totalValue): CreateBalanceParameterModelMasterRequest {
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withInitialValueStrategy(?string $initialValueStrategy): CreateBalanceParameterModelMasterRequest {
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
     * @return CreateBalanceParameterModelMasterRequest
     */
	public function withParameters(?array $parameters): CreateBalanceParameterModelMasterRequest {
		$this->parameters = $parameters;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateBalanceParameterModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateBalanceParameterModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
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
        );
    }
}