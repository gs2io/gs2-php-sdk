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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createThresholdMaster: Create Rank Up Threshold Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#createthresholdmaster
 */
class CreateThresholdMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rank Up Threshold name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Rank Up Experience Threshold */
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
     * @return CreateThresholdMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateThresholdMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rank Up Threshold name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Rank Up Threshold name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Rank Up Threshold name
     * @return CreateThresholdMasterRequest
     */
	public function withName(?string $name): CreateThresholdMasterRequest {
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
     * @return CreateThresholdMasterRequest
     */
	public function withDescription(?string $description): CreateThresholdMasterRequest {
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
     * @return CreateThresholdMasterRequest
     */
	public function withMetadata(?string $metadata): CreateThresholdMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Rank Up Experience Threshold */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values List of Rank Up Experience Threshold */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values List of Rank Up Experience Threshold
     * @return CreateThresholdMasterRequest
     */
	public function withValues(?array $values): CreateThresholdMasterRequest {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateThresholdMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateThresholdMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
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
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues()
            ),
        );
    }
}