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
 * Request for createRecoverIntervalTableMaster: Create Recovery Interval Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#createrecoverintervaltablemaster
 */
class CreateRecoverIntervalTableMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Recovery Interval Table name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Experience Model ID */
    private $experienceModelId;
    /** @var array Recovery Interval Values by Rank (Minutes) */
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
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateRecoverIntervalTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Recovery Interval Table name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Recovery Interval Table name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Recovery Interval Table name
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withName(?string $name): CreateRecoverIntervalTableMasterRequest {
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
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withDescription(?string $description): CreateRecoverIntervalTableMasterRequest {
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
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withMetadata(?string $metadata): CreateRecoverIntervalTableMasterRequest {
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
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withExperienceModelId(?string $experienceModelId): CreateRecoverIntervalTableMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null Recovery Interval Values by Rank (Minutes) */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Recovery Interval Values by Rank (Minutes) */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Recovery Interval Values by Rank (Minutes)
     * @return CreateRecoverIntervalTableMasterRequest
     */
	public function withValues(?array $values): CreateRecoverIntervalTableMasterRequest {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateRecoverIntervalTableMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateRecoverIntervalTableMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "name" => $this->getName(),
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