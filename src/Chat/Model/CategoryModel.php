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


/**
 * Message Category Model
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#categorymodel
 */
class CategoryModel implements IModel {
	/**
     * @var string Message Category Model GRN
	 */
	private $categoryModelId;
	/**
     * @var int Category
	 */
	private $category;
	/**
     * @var string Reject posts made using player access tokens
	 */
	private $rejectAccessTokenPost;
    /** @return string|null Message Category Model GRN */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}
    /** @param string|null $categoryModelId Message Category Model GRN */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}
    /**
     * @param string|null $categoryModelId Message Category Model GRN
     * @return CategoryModel
     */
	public function withCategoryModelId(?string $categoryModelId): CategoryModel {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
    /** @return int|null Category */
	public function getCategory(): ?int {
		return $this->category;
	}
    /** @param int|null $category Category */
	public function setCategory(?int $category) {
		$this->category = $category;
	}
    /**
     * @param int|null $category Category
     * @return CategoryModel
     */
	public function withCategory(?int $category): CategoryModel {
		$this->category = $category;
		return $this;
	}
    /** @return string|null Reject posts made using player access tokens */
	public function getRejectAccessTokenPost(): ?string {
		return $this->rejectAccessTokenPost;
	}
    /** @param string|null $rejectAccessTokenPost Reject posts made using player access tokens */
	public function setRejectAccessTokenPost(?string $rejectAccessTokenPost) {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
	}
    /**
     * @param string|null $rejectAccessTokenPost Reject posts made using player access tokens
     * @return CategoryModel
     */
	public function withRejectAccessTokenPost(?string $rejectAccessTokenPost): CategoryModel {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
		return $this;
	}

    public static function fromJson(?array $data): ?CategoryModel {
        if ($data === null) {
            return null;
        }
        return (new CategoryModel())
            ->withCategoryModelId(array_key_exists('categoryModelId', $data) && $data['categoryModelId'] !== null ? $data['categoryModelId'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withRejectAccessTokenPost(array_key_exists('rejectAccessTokenPost', $data) && $data['rejectAccessTokenPost'] !== null ? $data['rejectAccessTokenPost'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->getCategoryModelId(),
            "category" => $this->getCategory(),
            "rejectAccessTokenPost" => $this->getRejectAccessTokenPost(),
        );
    }
}