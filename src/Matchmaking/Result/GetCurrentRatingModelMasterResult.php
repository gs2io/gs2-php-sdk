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
use Gs2\Matchmaking\Model\CurrentRatingModelMaster;

/**
 * 現在有効なレーティングマスターを取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCurrentRatingModelMasterResult implements IResult {
	/** @var CurrentRatingModelMaster 現在有効なレーティングマスター */
	private $item;

	/**
	 * 現在有効なレーティングマスターを取得
	 *
	 * @return CurrentRatingModelMaster|null 現在有効なレーティングマスターを取得します
	 */
	public function getItem(): ?CurrentRatingModelMaster {
		return $this->item;
	}

	/**
	 * 現在有効なレーティングマスターを設定
	 *
	 * @param CurrentRatingModelMaster|null $item 現在有効なレーティングマスターを取得します
	 */
	public function setItem(?CurrentRatingModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCurrentRatingModelMasterResult {
        $result = new GetCurrentRatingModelMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentRatingModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}