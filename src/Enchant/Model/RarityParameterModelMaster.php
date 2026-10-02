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
 * Rarity Parameter Model Master
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#rarityparametermodelmaster
 */
class RarityParameterModelMaster implements IModel {
	/**
     * @var string Rarity Parameter Model GRN
	 */
	private $rarityParameterModelId;
	/**
     * @var string Rarity Parameter Model name
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
     * @var int Maximum number of parameters to be given
	 */
	private $maximumParameterCount;
	/**
     * @var array Rarity parameter count model list
	 */
	private $parameterCounts;
	/**
     * @var array Rarity parameter value model list
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
    /** @return string|null Rarity Parameter Model GRN */
	public function getRarityParameterModelId(): ?string {
		return $this->rarityParameterModelId;
	}
    /** @param string|null $rarityParameterModelId Rarity Parameter Model GRN */
	public function setRarityParameterModelId(?string $rarityParameterModelId) {
		$this->rarityParameterModelId = $rarityParameterModelId;
	}
    /**
     * @param string|null $rarityParameterModelId Rarity Parameter Model GRN
     * @return RarityParameterModelMaster
     */
	public function withRarityParameterModelId(?string $rarityParameterModelId): RarityParameterModelMaster {
		$this->rarityParameterModelId = $rarityParameterModelId;
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
     * @return RarityParameterModelMaster
     */
	public function withName(?string $name): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withDescription(?string $description): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withMetadata(?string $metadata): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withMaximumParameterCount(?int $maximumParameterCount): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withParameterCounts(?array $parameterCounts): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withParameters(?array $parameters): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withCreatedAt(?int $createdAt): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): RarityParameterModelMaster {
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
     * @return RarityParameterModelMaster
     */
	public function withRevision(?int $revision): RarityParameterModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?RarityParameterModelMaster {
        if ($data === null) {
            return null;
        }
        return (new RarityParameterModelMaster())
            ->withRarityParameterModelId(array_key_exists('rarityParameterModelId', $data) && $data['rarityParameterModelId'] !== null ? $data['rarityParameterModelId'] : null)
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
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "rarityParameterModelId" => $this->getRarityParameterModelId(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}