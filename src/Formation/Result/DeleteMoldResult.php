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
use Gs2\Formation\Model\Mold;

/**
 * 保存したフォームを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMoldResult implements IResult {
	/** @var Mold 保存したフォーム */
	private $item;

	/**
	 * 保存したフォームを取得
	 *
	 * @return Mold|null 保存したフォームを削除
	 */
	public function getItem(): ?Mold {
		return $this->item;
	}

	/**
	 * 保存したフォームを設定
	 *
	 * @param Mold|null $item 保存したフォームを削除
	 */
	public function setItem(?Mold $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteMoldResult {
        $result = new DeleteMoldResult();
        $result->setItem(isset($data["item"]) ? Mold::fromJson($data["item"]) : null);
        return $result;
    }
}