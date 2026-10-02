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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;


/**
 * Maximum Stamina Table
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#maxstaminatable
 */
class MaxStaminaTable implements IModel {
	/**
     * @var string Maximum Stamina Table Name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Experience Model ID
	 */
	private $experienceModelId;
	/**
     * @var array Maximum Stamina Values by Rank
	 */
	private $values;
    /** @return string|null Maximum Stamina Table Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Maximum Stamina Table Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Maximum Stamina Table Name
     * @return MaxStaminaTable
     */
	public function withName(?string $name): MaxStaminaTable {
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
     * @return MaxStaminaTable
     */
	public function withMetadata(?string $metadata): MaxStaminaTable {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Experience Model ID */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model ID */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model ID
     * @return MaxStaminaTable
     */
	public function withExperienceModelId(?string $experienceModelId): MaxStaminaTable {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null Maximum Stamina Values by Rank */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Maximum Stamina Values by Rank */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Maximum Stamina Values by Rank
     * @return MaxStaminaTable
     */
	public function withValues(?array $values): MaxStaminaTable {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?MaxStaminaTable {
        if ($data === null) {
            return null;
        }
        return (new MaxStaminaTable())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['values']
            ));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues()
            ),
        );
    }
}