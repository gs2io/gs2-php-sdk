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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\MoldModel;

/**
 * フォームの保存領域を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMoldModelResult implements IResult {
	/** @var MoldModel フォームの保存領域 */
	private $item;

	/**
	 * フォームの保存領域を取得
	 *
	 * @return MoldModel|null フォームの保存領域を取得
	 */
	public function getItem(): ?MoldModel {
		return $this->item;
	}

	/**
	 * フォームの保存領域を設定
	 *
	 * @param MoldModel|null $item フォームの保存領域を取得
	 */
	public function setItem(?MoldModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetMoldModelResult {
        $result = new GetMoldModelResult();
        $result->setItem(isset($data["item"]) ? MoldModel::fromJson($data["item"]) : null);
        return $result;
    }
}