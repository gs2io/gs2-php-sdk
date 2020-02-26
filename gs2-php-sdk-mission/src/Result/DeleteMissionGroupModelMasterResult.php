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
 * ミッショングループマスターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMissionGroupModelMasterResult implements IResult {
	/** @var MissionGroupModelMaster 削除したミッショングループ */
	private $item;

	/**
	 * 削除したミッショングループを取得
	 *
	 * @return MissionGroupModelMaster|null ミッショングループマスターを削除
	 */
	public function getItem(): ?MissionGroupModelMaster {
		return $this->item;
	}

	/**
	 * 削除したミッショングループを設定
	 *
	 * @param MissionGroupModelMaster|null $item ミッショングループマスターを削除
	 */
	public function setItem(?MissionGroupModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteMissionGroupModelMasterResult {
        $result = new DeleteMissionGroupModelMasterResult();
        $result->setItem(isset($data["item"]) ? MissionGroupModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}