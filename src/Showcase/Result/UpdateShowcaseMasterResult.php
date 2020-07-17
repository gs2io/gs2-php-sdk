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
use Gs2\Showcase\Model\ShowcaseMaster;

/**
 * 陳列棚マスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateShowcaseMasterResult implements IResult {
	/** @var ShowcaseMaster 更新した陳列棚マスター */
	private $item;

	/**
	 * 更新した陳列棚マスターを取得
	 *
	 * @return ShowcaseMaster|null 陳列棚マスターを更新
	 */
	public function getItem(): ?ShowcaseMaster {
		return $this->item;
	}

	/**
	 * 更新した陳列棚マスターを設定
	 *
	 * @param ShowcaseMaster|null $item 陳列棚マスターを更新
	 */
	public function setItem(?ShowcaseMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateShowcaseMasterResult {
        $result = new UpdateShowcaseMasterResult();
        $result->setItem(isset($data["item"]) ? ShowcaseMaster::fromJson($data["item"]) : null);
        return $result;
    }
}