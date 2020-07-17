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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\MissionGroupModel;

/**
 * ミッショングループを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMissionGroupModelResult implements IResult {
	/** @var MissionGroupModel ミッショングループ */
	private $item;

	/**
	 * ミッショングループを取得
	 *
	 * @return MissionGroupModel|null ミッショングループを取得
	 */
	public function getItem(): ?MissionGroupModel {
		return $this->item;
	}

	/**
	 * ミッショングループを設定
	 *
	 * @param MissionGroupModel|null $item ミッショングループを取得
	 */
	public function setItem(?MissionGroupModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetMissionGroupModelResult {
        $result = new GetMissionGroupModelResult();
        $result->setItem(isset($data["item"]) ? MissionGroupModel::fromJson($data["item"]) : null);
        return $result;
    }
}