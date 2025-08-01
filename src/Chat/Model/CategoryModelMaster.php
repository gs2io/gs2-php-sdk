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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


class CategoryModelMaster implements IModel {
	/**
     * @var string
	 */
	private $categoryModelId;
	/**
     * @var int
	 */
	private $category;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $rejectAccessTokenPost;
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
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
	public function withCategoryModelId(?string $categoryModelId): CategoryModelMaster {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
	public function getCategory(): ?int {
		return $this->category;
	}
	public function setCategory(?int $category) {
		$this->category = $category;
	}
	public function withCategory(?int $category): CategoryModelMaster {
		$this->category = $category;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CategoryModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getRejectAccessTokenPost(): ?string {
		return $this->rejectAccessTokenPost;
	}
	public function setRejectAccessTokenPost(?string $rejectAccessTokenPost) {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
	}
	public function withRejectAccessTokenPost(?string $rejectAccessTokenPost): CategoryModelMaster {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): CategoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): CategoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): CategoryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new CategoryModelMaster())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withRejectAccessTokenPost(array_key_exists('rejectAccessTokenPost', $data) && $data['rejectAccessTokenPost'] !== null ? $data['rejectAccessTokenPost'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "category" => $this->getCategory(),
            "description" => $this->getDescription(),
            "rejectAccessTokenPost" => $this->getRejectAccessTokenPost(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}