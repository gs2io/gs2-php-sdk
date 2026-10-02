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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateCategoryModelMaster: Update Message Category Model Master
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#updatecategorymodelmaster
 */
class UpdateCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Category */
    private $category;
    /** @var string Description */
    private $description;
    /** @var string Reject posts made using player access tokens */
    private $rejectAccessTokenPost;
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
     * @return UpdateCategoryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateCategoryModelMasterRequest
     */
	public function withCategory(?int $category): UpdateCategoryModelMasterRequest {
		$this->category = $category;
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
     * @return UpdateCategoryModelMasterRequest
     */
	public function withDescription(?string $description): UpdateCategoryModelMasterRequest {
		$this->description = $description;
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
     * @return UpdateCategoryModelMasterRequest
     */
	public function withRejectAccessTokenPost(?string $rejectAccessTokenPost): UpdateCategoryModelMasterRequest {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateCategoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withRejectAccessTokenPost(array_key_exists('rejectAccessTokenPost', $data) && $data['rejectAccessTokenPost'] !== null ? $data['rejectAccessTokenPost'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "category" => $this->getCategory(),
            "description" => $this->getDescription(),
            "rejectAccessTokenPost" => $this->getRejectAccessTokenPost(),
        );
    }
}