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
 * ミッショングループマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateMissionGroupModelMasterResult implements IResult {
	/** @var MissionGroupModelMaster 更新したミッショングループマスター */
	private $item;

	/**
	 * 更新したミッショングループマスターを取得
	 *
	 * @return MissionGroupModelMaster|null ミッショングループマスターを更新
	 */
	public function getItem(): ?MissionGroupModelMaster {
		return $this->item;
	}

	/**
	 * 更新したミッショングループマスターを設定
	 *
	 * @param MissionGroupModelMaster|null $item ミッショングループマスターを更新
	 */
	public function setItem(?MissionGroupModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateMissionGroupModelMasterResult {
        $result = new UpdateMissionGroupModelMasterResult();
        $result->setItem(isset($data["item"]) ? MissionGroupModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}