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

namespace Gs2\Ranking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking\Model\CategoryModel;

/**
 * カテゴリを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCategoryModelResult implements IResult {
	/** @var CategoryModel カテゴリ */
	private $item;

	/**
	 * カテゴリを取得
	 *
	 * @return CategoryModel|null カテゴリを取得
	 */
	public function getItem(): ?CategoryModel {
		return $this->item;
	}

	/**
	 * カテゴリを設定
	 *
	 * @param CategoryModel|null $item カテゴリを取得
	 */
	public function setItem(?CategoryModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCategoryModelResult {
        $result = new GetCategoryModelResult();
        $result->setItem(isset($data["item"]) ? CategoryModel::fromJson($data["item"]) : null);
        return $result;
    }
}