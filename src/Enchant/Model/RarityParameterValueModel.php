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


class RarityParameterValueModel implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $resourceName;
	/**
     * @var int
	 */
	private $resourceValue;
	/**
     * @var int
	 */
	private $weight;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RarityParameterValueModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RarityParameterValueModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getResourceName(): ?string {
		return $this->resourceName;
	}
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}
	public function withResourceName(?string $resourceName): RarityParameterValueModel {
		$this->resourceName = $resourceName;
		return $this;
	}
	public function getResourceValue(): ?int {
		return $this->resourceValue;
	}
	public function setResourceValue(?int $resourceValue) {
		$this->resourceValue = $resourceValue;
	}
	public function withResourceValue(?int $resourceValue): RarityParameterValueModel {
		$this->resourceValue = $resourceValue;
		return $this;
	}
	public function getWeight(): ?int {
		return $this->weight;
	}
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
	public function withWeight(?int $weight): RarityParameterValueModel {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?RarityParameterValueModel {
        if ($data === null) {
            return null;
        }
        return (new RarityParameterValueModel())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withResourceName(array_key_exists('resourceName', $data) && $data['resourceName'] !== null ? $data['resourceName'] : null)
            ->withResourceValue(array_key_exists('resourceValue', $data) && $data['resourceValue'] !== null ? $data['resourceValue'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "resourceName" => $this->getResourceName(),
            "resourceValue" => $this->getResourceValue(),
            "weight" => $this->getWeight(),
        );
    }
}