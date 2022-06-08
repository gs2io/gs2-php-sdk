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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


class CalculatedAt implements IModel {
	/**
     * @var string
	 */
	private $categoryName;
	/**
     * @var int
	 */
	private $calculatedAt;
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): CalculatedAt {
		$this->categoryName = $categoryName;
		return $this;
	}
	public function getCalculatedAt(): ?int {
		return $this->calculatedAt;
	}
	public function setCalculatedAt(?int $calculatedAt) {
		$this->calculatedAt = $calculatedAt;
	}
	public function withCalculatedAt(?int $calculatedAt): CalculatedAt {
		$this->calculatedAt = $calculatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?CalculatedAt {
        if ($data === null) {
            return null;
        }
        return (new CalculatedAt())
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withCalculatedAt(array_key_exists('calculatedAt', $data) && $data['calculatedAt'] !== null ? $data['calculatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "categoryName" => $this->getCategoryName(),
            "calculatedAt" => $this->getCalculatedAt(),
        );
    }
}