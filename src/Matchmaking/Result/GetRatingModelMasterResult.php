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
use Gs2\Matchmaking\Model\RatingModelMaster;

/**
 * レーティングモデルマスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRatingModelMasterResult implements IResult {
	/** @var RatingModelMaster レーティングモデルマスター */
	private $item;

	/**
	 * レーティングモデルマスターを取得
	 *
	 * @return RatingModelMaster|null レーティングモデルマスターを取得
	 */
	public function getItem(): ?RatingModelMaster {
		return $this->item;
	}

	/**
	 * レーティングモデルマスターを設定
	 *
	 * @param RatingModelMaster|null $item レーティングモデルマスターを取得
	 */
	public function setItem(?RatingModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRatingModelMasterResult {
        $result = new GetRatingModelMasterResult();
        $result->setItem(isset($data["item"]) ? RatingModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}