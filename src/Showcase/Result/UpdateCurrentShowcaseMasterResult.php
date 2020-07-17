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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\CurrentShowcaseMaster;

/**
 * 現在有効な陳列棚マスターを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentShowcaseMasterResult implements IResult {
	/** @var CurrentShowcaseMaster 更新した現在有効な陳列棚マスター */
	private $item;

	/**
	 * 更新した現在有効な陳列棚マスターを取得
	 *
	 * @return CurrentShowcaseMaster|null 現在有効な陳列棚マスターを更新します
	 */
	public function getItem(): ?CurrentShowcaseMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効な陳列棚マスターを設定
	 *
	 * @param CurrentShowcaseMaster|null $item 現在有効な陳列棚マスターを更新します
	 */
	public function setItem(?CurrentShowcaseMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentShowcaseMasterResult {
        $result = new UpdateCurrentShowcaseMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentShowcaseMaster::fromJson($data["item"]) : null);
        return $result;
    }
}