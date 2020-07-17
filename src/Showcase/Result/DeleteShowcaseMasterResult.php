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
 * 陳列棚マスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteShowcaseMasterResult implements IResult {
	/** @var ShowcaseMaster 削除した陳列棚マスター */
	private $item;

	/**
	 * 削除した陳列棚マスターを取得
	 *
	 * @return ShowcaseMaster|null 陳列棚マスターを削除
	 */
	public function getItem(): ?ShowcaseMaster {
		return $this->item;
	}

	/**
	 * 削除した陳列棚マスターを設定
	 *
	 * @param ShowcaseMaster|null $item 陳列棚マスターを削除
	 */
	public function setItem(?ShowcaseMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteShowcaseMasterResult {
        $result = new DeleteShowcaseMasterResult();
        $result->setItem(isset($data["item"]) ? ShowcaseMaster::fromJson($data["item"]) : null);
        return $result;
    }
}