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

namespace Gs2\Freeze\Model;

use Gs2\Core\Model\IModel;


/**
 * Stage
 *
 * @see https://docs.gs2.io/api_reference/freeze/sdk/#stage
 */
class Stage implements IModel {
	/**
     * @var string Stage GRN
	 */
	private $stageId;
	/**
     * @var string Stage name
	 */
	private $name;
	/**
     * @var string Source stage name
	 */
	private $sourceStageName;
	/**
     * @var int Sort number
	 */
	private $sortNumber;
	/**
     * @var string Status
	 */
	private $status;
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
    /** @return string|null Stage GRN */
	public function getStageId(): ?string {
		return $this->stageId;
	}
    /** @param string|null $stageId Stage GRN */
	public function setStageId(?string $stageId) {
		$this->stageId = $stageId;
	}
    /**
     * @param string|null $stageId Stage GRN
     * @return Stage
     */
	public function withStageId(?string $stageId): Stage {
		$this->stageId = $stageId;
		return $this;
	}
    /** @return string|null Stage name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stage name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stage name
     * @return Stage
     */
	public function withName(?string $name): Stage {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Source stage name */
	public function getSourceStageName(): ?string {
		return $this->sourceStageName;
	}
    /** @param string|null $sourceStageName Source stage name */
	public function setSourceStageName(?string $sourceStageName) {
		$this->sourceStageName = $sourceStageName;
	}
    /**
     * @param string|null $sourceStageName Source stage name
     * @return Stage
     */
	public function withSourceStageName(?string $sourceStageName): Stage {
		$this->sourceStageName = $sourceStageName;
		return $this;
	}
    /** @return int|null Sort number */
	public function getSortNumber(): ?int {
		return $this->sortNumber;
	}
    /** @param int|null $sortNumber Sort number */
	public function setSortNumber(?int $sortNumber) {
		$this->sortNumber = $sortNumber;
	}
    /**
     * @param int|null $sortNumber Sort number
     * @return Stage
     */
	public function withSortNumber(?int $sortNumber): Stage {
		$this->sortNumber = $sortNumber;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return Stage
     */
	public function withStatus(?string $status): Stage {
		$this->status = $status;
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
     * @return Stage
     */
	public function withCreatedAt(?int $createdAt): Stage {
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
     * @return Stage
     */
	public function withUpdatedAt(?int $updatedAt): Stage {
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
     * @return Stage
     */
	public function withRevision(?int $revision): Stage {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Stage {
        if ($data === null) {
            return null;
        }
        return (new Stage())
            ->withStageId(array_key_exists('stageId', $data) && $data['stageId'] !== null ? $data['stageId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withSourceStageName(array_key_exists('sourceStageName', $data) && $data['sourceStageName'] !== null ? $data['sourceStageName'] : null)
            ->withSortNumber(array_key_exists('sortNumber', $data) && $data['sortNumber'] !== null ? $data['sortNumber'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "stageId" => $this->getStageId(),
            "name" => $this->getName(),
            "sourceStageName" => $this->getSourceStageName(),
            "sortNumber" => $this->getSortNumber(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}