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

class CreateCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $category;
    /** @var string */
    private $description;
    /** @var string */
    private $rejectAccessTokenPost;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCategory(): ?int {
		return $this->category;
	}
	public function setCategory(?int $category) {
		$this->category = $category;
	}
	public function withCategory(?int $category): CreateCategoryModelMasterRequest {
		$this->category = $category;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateCategoryModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getRejectAccessTokenPost(): ?string {
		return $this->rejectAccessTokenPost;
	}
	public function setRejectAccessTokenPost(?string $rejectAccessTokenPost) {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
	}
	public function withRejectAccessTokenPost(?string $rejectAccessTokenPost): CreateCategoryModelMasterRequest {
		$this->rejectAccessTokenPost = $rejectAccessTokenPost;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateCategoryModelMasterRequest())
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