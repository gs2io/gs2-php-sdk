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
use Gs2\Enchant\Model\RarityParameterCountModel;
use Gs2\Enchant\Model\RarityParameterValueModel;

class CreateRarityParameterModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $maximumParameterCount;
    /** @var array */
    private $parameterCounts;
    /** @var array */
    private $parameters;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateRarityParameterModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateRarityParameterModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateRarityParameterModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateRarityParameterModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMaximumParameterCount(): ?int {
		return $this->maximumParameterCount;
	}
	public function setMaximumParameterCount(?int $maximumParameterCount) {
		$this->maximumParameterCount = $maximumParameterCount;
	}
	public function withMaximumParameterCount(?int $maximumParameterCount): CreateRarityParameterModelMasterRequest {
		$this->maximumParameterCount = $maximumParameterCount;
		return $this;
	}
	public function getParameterCounts(): ?array {
		return $this->parameterCounts;
	}
	public function setParameterCounts(?array $parameterCounts) {
		$this->parameterCounts = $parameterCounts;
	}
	public function withParameterCounts(?array $parameterCounts): CreateRarityParameterModelMasterRequest {
		$this->parameterCounts = $parameterCounts;
		return $this;
	}
	public function getParameters(): ?array {
		return $this->parameters;
	}
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
	public function withParameters(?array $parameters): CreateRarityParameterModelMasterRequest {
		$this->parameters = $parameters;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRarityParameterModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateRarityParameterModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMaximumParameterCount(array_key_exists('maximumParameterCount', $data) && $data['maximumParameterCount'] !== null ? $data['maximumParameterCount'] : null)
            ->withParameterCounts(array_map(
                function ($item) {
                    return RarityParameterCountModel::fromJson($item);
                },
                array_key_exists('parameterCounts', $data) && $data['parameterCounts'] !== null ? $data['parameterCounts'] : []
            ))
            ->withParameters(array_map(
                function ($item) {
                    return RarityParameterValueModel::fromJson($item);
                },
                array_key_exists('parameters', $data) && $data['parameters'] !== null ? $data['parameters'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "maximumParameterCount" => $this->getMaximumParameterCount(),
            "parameterCounts" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameterCounts() !== null && $this->getParameterCounts() !== null ? $this->getParameterCounts() : []
            ),
            "parameters" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameters() !== null && $this->getParameters() !== null ? $this->getParameters() : []
            ),
        );
    }
}