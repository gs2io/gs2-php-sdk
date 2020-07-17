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
use Gs2\Mission\Model\MissionTaskModel;

/**
 * ミッションタスクを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMissionTaskModelResult implements IResult {
	/** @var MissionTaskModel ミッションタスク */
	private $item;

	/**
	 * ミッションタスクを取得
	 *
	 * @return MissionTaskModel|null ミッションタスクを取得
	 */
	public function getItem(): ?MissionTaskModel {
		return $this->item;
	}

	/**
	 * ミッションタスクを設定
	 *
	 * @param MissionTaskModel|null $item ミッションタスクを取得
	 */
	public function setItem(?MissionTaskModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetMissionTaskModelResult {
        $result = new GetMissionTaskModelResult();
        $result->setItem(isset($data["item"]) ? MissionTaskModel::fromJson($data["item"]) : null);
        return $result;
    }
}