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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Unleash Recipe
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashrecipe
 */
class UnleashRecipe implements IModel {
	/**
     * @var string Recipe name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array Group keys of the targets this recipe can be used for
	 */
	private $targetGroupKeys;
	/**
     * @var array Materials required by this recipe
	 */
	private $materials;
    /** @return string|null Recipe name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Recipe name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Recipe name
     * @return UnleashRecipe
     */
	public function withName(?string $name): UnleashRecipe {
		$this->name = $name;
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
     * @return UnleashRecipe
     */
	public function withMetadata(?string $metadata): UnleashRecipe {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Group keys of the targets this recipe can be used for */
	public function getTargetGroupKeys(): ?array {
		return $this->targetGroupKeys;
	}
    /** @param array|null $targetGroupKeys Group keys of the targets this recipe can be used for */
	public function setTargetGroupKeys(?array $targetGroupKeys) {
		$this->targetGroupKeys = $targetGroupKeys;
	}
    /**
     * @param array|null $targetGroupKeys Group keys of the targets this recipe can be used for
     * @return UnleashRecipe
     */
	public function withTargetGroupKeys(?array $targetGroupKeys): UnleashRecipe {
		$this->targetGroupKeys = $targetGroupKeys;
		return $this;
	}
    /** @return array|null Materials required by this recipe */
	public function getMaterials(): ?array {
		return $this->materials;
	}
    /** @param array|null $materials Materials required by this recipe */
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
    /**
     * @param array|null $materials Materials required by this recipe
     * @return UnleashRecipe
     */
	public function withMaterials(?array $materials): UnleashRecipe {
		$this->materials = $materials;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRecipe {
        if ($data === null) {
            return null;
        }
        return (new UnleashRecipe())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetGroupKeys(!array_key_exists('targetGroupKeys', $data) || $data['targetGroupKeys'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['targetGroupKeys']
            ))
            ->withMaterials(!array_key_exists('materials', $data) || $data['materials'] === null ? null : array_map(
                function ($item) {
                    return UnleashMaterial::fromJson($item);
                },
                $data['materials']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "targetGroupKeys" => $this->getTargetGroupKeys() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetGroupKeys()
            ),
            "materials" => $this->getMaterials() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials()
            ),
        );
    }
}