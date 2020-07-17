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
 * ランクキャップを設定 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SetRankCapByUserIdResult implements IResult {
	/** @var Status 更新後のステータス */
	private $item;

	/**
	 * 更新後のステータスを取得
	 *
	 * @return Status|null ランクキャップを設定
	 */
	public function getItem(): ?Status {
		return $this->item;
	}

	/**
	 * 更新後のステータスを設定
	 *
	 * @param Status|null $item ランクキャップを設定
	 */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): SetRankCapByUserIdResult {
        $result = new SetRankCapByUserIdResult();
        $result->setItem(isset($data["item"]) ? Status::fromJson($data["item"]) : null);
        return $result;
    }
}