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
use Gs2\Mission\Model\MissionGroupModelMaster;

/**
 * ミッショングループマスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMissionGroupModelMasterResult implements IResult {
	/** @var MissionGroupModelMaster ミッショングループマスター */
	private $item;

	/**
	 * ミッショングループマスターを取得
	 *
	 * @return MissionGroupModelMaster|null ミッショングループマスターを取得
	 */
	public function getItem(): ?MissionGroupModelMaster {
		return $this->item;
	}

	/**
	 * ミッショングループマスターを設定
	 *
	 * @param MissionGroupModelMaster|null $item ミッショングループマスターを取得
	 */
	public function setItem(?MissionGroupModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetMissionGroupModelMasterResult {
        $result = new GetMissionGroupModelMasterResult();
        $result->setItem(isset($data["item"]) ? MissionGroupModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}