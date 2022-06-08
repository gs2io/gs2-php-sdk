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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateMaxStaminaTableMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $maxStaminaTableName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $experienceModelId;
    /** @var array */
    private $values;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateMaxStaminaTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}
	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}
	public function withMaxStaminaTableName(?string $maxStaminaTableName): UpdateMaxStaminaTableMasterRequest {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateMaxStaminaTableMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateMaxStaminaTableMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): UpdateMaxStaminaTableMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getValues(): ?array {
		return $this->values;
	}
	public function setValues(?array $values) {
		$this->values = $values;
	}
	public function withValues(?array $values): UpdateMaxStaminaTableMasterRequest {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMaxStaminaTableMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMaxStaminaTableMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMaxStaminaTableName(array_key_exists('maxStaminaTableName', $data) && $data['maxStaminaTableName'] !== null ? $data['maxStaminaTableName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('values', $data) && $data['values'] !== null ? $data['values'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "maxStaminaTableName" => $this->getMaxStaminaTableName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues() !== null && $this->getValues() !== null ? $this->getValues() : []
            ),
        );
    }
}