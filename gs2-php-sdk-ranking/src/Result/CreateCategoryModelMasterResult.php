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
use Gs2\Ranking\Model\CategoryModelMaster;

/**
 * カテゴリマスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateCategoryModelMasterResult implements IResult {
	/** @var CategoryModelMaster 作成したカテゴリマスター */
	private $item;

	/**
	 * 作成したカテゴリマスターを取得
	 *
	 * @return CategoryModelMaster|null カテゴリマスターを新規作成
	 */
	public function getItem(): ?CategoryModelMaster {
		return $this->item;
	}

	/**
	 * 作成したカテゴリマスターを設定
	 *
	 * @param CategoryModelMaster|null $item カテゴリマスターを新規作成
	 */
	public function setItem(?CategoryModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateCategoryModelMasterResult {
        $result = new CreateCategoryModelMasterResult();
        $result->setItem(isset($data["item"]) ? CategoryModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}