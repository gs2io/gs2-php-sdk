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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\Status;

/**
 * ステータスを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteStatusByUserIdResult implements IResult {
	/** @var Status ステータス */
	private $item;

	/**
	 * ステータスを取得
	 *
	 * @return Status|null ステータスを削除
	 */
	public function getItem(): ?Status {
		return $this->item;
	}

	/**
	 * ステータスを設定
	 *
	 * @param Status|null $item ステータスを削除
	 */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteStatusByUserIdResult {
        $result = new DeleteStatusByUserIdResult();
        $result->setItem(isset($data["item"]) ? Status::fromJson($data["item"]) : null);
        return $result;
    }
}