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
use Gs2\Ranking\Model\Score;

/**
 * ユーザーIDを指定してスコアを登録 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class PutScoreByUserIdResult implements IResult {
	/** @var Score 登録したスコア */
	private $item;

	/**
	 * 登録したスコアを取得
	 *
	 * @return Score|null ユーザーIDを指定してスコアを登録
	 */
	public function getItem(): ?Score {
		return $this->item;
	}

	/**
	 * 登録したスコアを設定
	 *
	 * @param Score|null $item ユーザーIDを指定してスコアを登録
	 */
	public function setItem(?Score $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): PutScoreByUserIdResult {
        $result = new PutScoreByUserIdResult();
        $result->setItem(isset($data["item"]) ? Score::fromJson($data["item"]) : null);
        return $result;
    }
}