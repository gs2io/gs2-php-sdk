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

/**
 * Request for createRarityParameterModelMaster: Create Rarity Parameter Model Master
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#createrarityparametermodelmaster
 */
class CreateRarityParameterModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rarity Parameter Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Maximum number of parameters to be given */
    private $maximumParameterCount;
    /** @var array Rarity parameter count model list */
    private $parameterCounts;
    /** @var array Rarity parameter value model list */
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
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateRarityParameterModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rarity Parameter Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Rarity Parameter Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Rarity Parameter Model name
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withName(?string $name): CreateRarityParameterModelMasterRequest {
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
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withDescription(?string $description): CreateRarityParameterModelMasterRequest {
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
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateRarityParameterModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Maximum number of parameters to be given */
	public function getMaximumParameterCount(): ?int {
		return $this->maximumParameterCount;
	}
    /** @param int|null $maximumParameterCount Maximum number of parameters to be given */
	public function setMaximumParameterCount(?int $maximumParameterCount) {
		$this->maximumParameterCount = $maximumParameterCount;
	}
    /**
     * @param int|null $maximumParameterCount Maximum number of parameters to be given
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withMaximumParameterCount(?int $maximumParameterCount): CreateRarityParameterModelMasterRequest {
		$this->maximumParameterCount = $maximumParameterCount;
		return $this;
	}
    /** @return array|null Rarity parameter count model list */
	public function getParameterCounts(): ?array {
		return $this->parameterCounts;
	}
    /** @param array|null $parameterCounts Rarity parameter count model list */
	public function setParameterCounts(?array $parameterCounts) {
		$this->parameterCounts = $parameterCounts;
	}
    /**
     * @param array|null $parameterCounts Rarity parameter count model list
     * @return CreateRarityParameterModelMasterRequest
     */
	public function withParameterCounts(?array $parameterCounts): CreateRarityParameterModelMasterRequest {
		$this->parameterCounts = $parameterCounts;
		return $this;
	}
    /** @return array|null Rarity parameter value model list */
	public function getParameters(): ?array {
		return $this->parameters;
	}
    /** @param array|null $parameters Rarity parameter value model list */
	public function setParameters(?array $parameters) {
		$this->parameters = $parameters;
	}
    /**
     * @param array|null $parameters Rarity parameter value model list
     * @return CreateRarityParameterModelMasterRequest
     */
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
            ->withParameterCounts(!array_key_exists('parameterCounts', $data) || $data['parameterCounts'] === null ? null : array_map(
                function ($item) {
                    return RarityParameterCountModel::fromJson($item);
                },
                $data['parameterCounts']
            ))
            ->withParameters(!array_key_exists('parameters', $data) || $data['parameters'] === null ? null : array_map(
                function ($item) {
                    return RarityParameterValueModel::fromJson($item);
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
            "maximumParameterCount" => $this->getMaximumParameterCount(),
            "parameterCounts" => $this->getParameterCounts() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameterCounts()
            ),
            "parameters" => $this->getParameters() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameters()
            ),
        );
    }
}