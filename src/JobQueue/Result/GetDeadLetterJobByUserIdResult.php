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

namespace Gs2\JobQueue\Result;

use Gs2\Core\Model\IResult;
use Gs2\JobQueue\Model\DeadLetterJob;

/**
 * デッドレタージョブを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetDeadLetterJobByUserIdResult implements IResult {
	/** @var DeadLetterJob デッドレタージョブ */
	private $item;

	/**
	 * デッドレタージョブを取得
	 *
	 * @return DeadLetterJob|null デッドレタージョブを取得
	 */
	public function getItem(): ?DeadLetterJob {
		return $this->item;
	}

	/**
	 * デッドレタージョブを設定
	 *
	 * @param DeadLetterJob|null $item デッドレタージョブを取得
	 */
	public function setItem(?DeadLetterJob $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetDeadLetterJobByUserIdResult {
        $result = new GetDeadLetterJobByUserIdResult();
        $result->setItem(isset($data["item"]) ? DeadLetterJob::fromJson($data["item"]) : null);
        return $result;
    }
}