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

namespace Gs2\Idle\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteCategoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DeleteCategoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): DeleteCategoryModelMasterRequest {
		$this->categoryName = $categoryName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteCategoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteCategoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
        );
    }
}