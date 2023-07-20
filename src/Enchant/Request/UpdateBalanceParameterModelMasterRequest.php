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

class UpdateBalanceParameterModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $parameterName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $totalValue;
    /** @var string */
    private $initialValueStrategy;
    /** @var array */
    private $parameters;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateBalanceParameterModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
	public function withParameterName(?string $parameterName): UpdateBalanceParameterModelMasterRequest {
		$this->parameterName = $parameterName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateBalanceParameterModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateBalanceParameterModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTotalValue(): ?int {
		return $this->totalValue;
	}
	public function setTotalValue(?int $totalValue) {
		$this->totalValue = $totalValue;
	}
	public function withTotalValue(?int $totalValue): UpdateBalanceParameterModelMasterRequest {
		$this->totalValue = $totalValue;
		return $this;
	}
	public function getInitialValueStrategy(): ?string {
		return $this->initialValueStrategy;
	}
	public function setInitialValueStrategy(?string $initialValueStrategy) {
		$this->initialValueStrategy = $initialValueStrategy;
	}
	public function withInitialValueStrategy(?string $initialValueStrategy): UpdateBalanceParameterModelMasterRequest {
		$this->initialValueStrategy = $initialValueStrategy;
		return $this;
	}
	public function getParameters(): ?array {
		return $this->parameters;
	}
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
	public function withParameters(?array $parameters): UpdateBalanceParameterModelMasterRequest {
		$this->parameters = $parameters;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBalanceParameterModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBalanceParameterModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTotalValue(array_key_exists('totalValue', $data) && $data['totalValue'] !== null ? $data['totalValue'] : null)
            ->withInitialValueStrategy(array_key_exists('initialValueStrategy', $data) && $data['initialValueStrategy'] !== null ? $data['initialValueStrategy'] : null)
            ->withParameters(array_map(
                function ($item) {
                    return BalanceParameterValueModel::fromJson($item);
                },
                array_key_exists('parameters', $data) && $data['parameters'] !== null ? $data['parameters'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "parameterName" => $this->getParameterName(),
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
        );
    }
}