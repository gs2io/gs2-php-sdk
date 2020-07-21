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
 * レーティングモデルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRatingModelMasterResult implements IResult {
	/** @var RatingModelMaster 更新したレーティングモデルマスター */
	private $item;

	/**
	 * 更新したレーティングモデルマスターを取得
	 *
	 * @return RatingModelMaster|null レーティングモデルマスターを更新
	 */
	public function getItem(): ?RatingModelMaster {
		return $this->item;
	}

	/**
	 * 更新したレーティングモデルマスターを設定
	 *
	 * @param RatingModelMaster|null $item レーティングモデルマスターを更新
	 */
	public function setItem(?RatingModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateRatingModelMasterResult {
        $result = new UpdateRatingModelMasterResult();
        $result->setItem(isset($data["item"]) ? RatingModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}