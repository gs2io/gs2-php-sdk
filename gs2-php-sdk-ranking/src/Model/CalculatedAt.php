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

/**
 * 集計日時
 *
 * @author Game Server Services, Inc.
 *
 */
class CalculatedAt implements IModel {
	/**
     * @var string カテゴリ名
	 */
	protected $categoryName;

	/**
	 * カテゴリ名を取得
	 *
	 * @return string|null カテゴリ名
	 */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 * @return CalculatedAt $this
	 */
	public function withCategoryName(?string $categoryName): CalculatedAt {
		$this->categoryName = $categoryName;
		return $this;
	}
	/**
     * @var int 集計日時
	 */
	protected $calculatedAt;

	/**
	 * 集計日時を取得
	 *
	 * @return int|null 集計日時
	 */
	public function getCalculatedAt(): ?int {
		return $this->calculatedAt;
	}

	/**
	 * 集計日時を設定
	 *
	 * @param int|null $calculatedAt 集計日時
	 */
	public function setCalculatedAt(?int $calculatedAt) {
		$this->calculatedAt = $calculatedAt;
	}

	/**
	 * 集計日時を設定
	 *
	 * @param int|null $calculatedAt 集計日時
	 * @return CalculatedAt $this
	 */
	public function withCalculatedAt(?int $calculatedAt): CalculatedAt {
		$this->calculatedAt = $calculatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "categoryName" => $this->categoryName,
            "calculatedAt" => $this->calculatedAt,
        );
    }

    public static function fromJson(array $data): CalculatedAt {
        $model = new CalculatedAt();
        $model->setCategoryName(isset($data["categoryName"]) ? $data["categoryName"] : null);
        $model->setCalculatedAt(isset($data["calculatedAt"]) ? $data["calculatedAt"] : null);
        return $model;
    }
}