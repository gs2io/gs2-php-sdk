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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


/**
 * Rank Up Threshold Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#thresholdmaster
 */
class ThresholdMaster implements IModel {
	/**
     * @var string Rank Up Threshold Master GRN
	 */
	private $thresholdId;
	/**
     * @var string Rank Up Threshold name
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
     * @var array List of Rank Up Experience Threshold
	 */
	private $values;
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
    /** @return string|null Rank Up Threshold Master GRN */
	public function getThresholdId(): ?string {
		return $this->thresholdId;
	}
    /** @param string|null $thresholdId Rank Up Threshold Master GRN */
	public function setThresholdId(?string $thresholdId) {
		$this->thresholdId = $thresholdId;
	}
    /**
     * @param string|null $thresholdId Rank Up Threshold Master GRN
     * @return ThresholdMaster
     */
	public function withThresholdId(?string $thresholdId): ThresholdMaster {
		$this->thresholdId = $thresholdId;
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
     * @return ThresholdMaster
     */
	public function withName(?string $name): ThresholdMaster {
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
     * @return ThresholdMaster
     */
	public function withDescription(?string $description): ThresholdMaster {
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
     * @return ThresholdMaster
     */
	public function withMetadata(?string $metadata): ThresholdMaster {
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
     * @return ThresholdMaster
     */
	public function withValues(?array $values): ThresholdMaster {
		$this->values = $values;
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
     * @return ThresholdMaster
     */
	public function withCreatedAt(?int $createdAt): ThresholdMaster {
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
     * @return ThresholdMaster
     */
	public function withUpdatedAt(?int $updatedAt): ThresholdMaster {
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
     * @return ThresholdMaster
     */
	public function withRevision(?int $revision): ThresholdMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ThresholdMaster {
        if ($data === null) {
            return null;
        }
        return (new ThresholdMaster())
            ->withThresholdId(array_key_exists('thresholdId', $data) && $data['thresholdId'] !== null ? $data['thresholdId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['values']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "thresholdId" => $this->getThresholdId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}