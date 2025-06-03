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


class Stage implements IModel {
	/**
     * @var string
	 */
	private $stageId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $sourceStageName;
	/**
     * @var int
	 */
	private $sortNumber;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStageId(): ?string {
		return $this->stageId;
	}
	public function setStageId(?string $stageId) {
		$this->stageId = $stageId;
	}
	public function withStageId(?string $stageId): Stage {
		$this->stageId = $stageId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Stage {
		$this->name = $name;
		return $this;
	}
	public function getSourceStageName(): ?string {
		return $this->sourceStageName;
	}
	public function setSourceStageName(?string $sourceStageName) {
		$this->sourceStageName = $sourceStageName;
	}
	public function withSourceStageName(?string $sourceStageName): Stage {
		$this->sourceStageName = $sourceStageName;
		return $this;
	}
	public function getSortNumber(): ?int {
		return $this->sortNumber;
	}
	public function setSortNumber(?int $sortNumber) {
		$this->sortNumber = $sortNumber;
	}
	public function withSortNumber(?int $sortNumber): Stage {
		$this->sortNumber = $sortNumber;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): Stage {
		$this->status = $status;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Stage {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Stage {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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