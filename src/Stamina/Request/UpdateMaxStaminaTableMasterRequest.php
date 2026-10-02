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

/**
 * Request for updateMaxStaminaTableMaster: Update Maximum Stamina Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#updatemaxstaminatablemaster
 */
class UpdateMaxStaminaTableMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Maximum Stamina Value Table Name */
    private $maxStaminaTableName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Experience Model ID */
    private $experienceModelId;
    /** @var array Maximum Stamina Values by Rank */
    private $values;
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
     * @return UpdateMaxStaminaTableMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateMaxStaminaTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Maximum Stamina Value Table Name */
	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}
    /** @param string|null $maxStaminaTableName Maximum Stamina Value Table Name */
	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}
    /**
     * @param string|null $maxStaminaTableName Maximum Stamina Value Table Name
     * @return UpdateMaxStaminaTableMasterRequest
     */
	public function withMaxStaminaTableName(?string $maxStaminaTableName): UpdateMaxStaminaTableMasterRequest {
		$this->maxStaminaTableName = $maxStaminaTableName;
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
     * @return UpdateMaxStaminaTableMasterRequest
     */
	public function withDescription(?string $description): UpdateMaxStaminaTableMasterRequest {
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
     * @return UpdateMaxStaminaTableMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateMaxStaminaTableMasterRequest {
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
     * @return UpdateMaxStaminaTableMasterRequest
     */
	public function withExperienceModelId(?string $experienceModelId): UpdateMaxStaminaTableMasterRequest {
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
     * @return UpdateMaxStaminaTableMasterRequest
     */
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
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['values']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "maxStaminaTableName" => $this->getMaxStaminaTableName(),
            "description" => $this->getDescription(),
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