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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Ballot;

/**
 * 対戦結果を投票します。 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class VoteResult implements IResult {
	/** @var Ballot 投票用紙 */
	private $item;

	/**
	 * 投票用紙を取得
	 *
	 * @return Ballot|null 対戦結果を投票します。
	 */
	public function getItem(): ?Ballot {
		return $this->item;
	}

	/**
	 * 投票用紙を設定
	 *
	 * @param Ballot|null $item 対戦結果を投票します。
	 */
	public function setItem(?Ballot $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): VoteResult {
        $result = new VoteResult();
        $result->setItem(isset($data["item"]) ? Ballot::fromJson($data["item"]) : null);
        return $result;
    }
}