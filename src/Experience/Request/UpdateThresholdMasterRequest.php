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
 * Request for updateThresholdMaster: Update Rank Up Threshold Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#updatethresholdmaster
 */
class UpdateThresholdMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rank Up Threshold name */
    private $thresholdName;
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
     * @return UpdateThresholdMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateThresholdMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rank Up Threshold name */
	public function getThresholdName(): ?string {
		return $this->thresholdName;
	}
    /** @param string|null $thresholdName Rank Up Threshold name */
	public function setThresholdName(?string $thresholdName) {
		$this->thresholdName = $thresholdName;
	}
    /**
     * @param string|null $thresholdName Rank Up Threshold name
     * @return UpdateThresholdMasterRequest
     */
	public function withThresholdName(?string $thresholdName): UpdateThresholdMasterRequest {
		$this->thresholdName = $thresholdName;
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
     * @return UpdateThresholdMasterRequest
     */
	public function withDescription(?string $description): UpdateThresholdMasterRequest {
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
     * @return UpdateThresholdMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateThresholdMasterRequest {
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
     * @return UpdateThresholdMasterRequest
     */
	public function withValues(?array $values): UpdateThresholdMasterRequest {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateThresholdMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateThresholdMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withThresholdName(array_key_exists('thresholdName', $data) && $data['thresholdName'] !== null ? $data['thresholdName'] : null)
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
            "thresholdName" => $this->getThresholdName(),
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