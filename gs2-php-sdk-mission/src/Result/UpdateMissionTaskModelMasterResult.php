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
use Gs2\Mission\Model\MissionTaskModelMaster;

/**
 * ミッションタスクマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateMissionTaskModelMasterResult implements IResult {
	/** @var MissionTaskModelMaster 更新したミッションタスクマスター */
	private $item;

	/**
	 * 更新したミッションタスクマスターを取得
	 *
	 * @return MissionTaskModelMaster|null ミッションタスクマスターを更新
	 */
	public function getItem(): ?MissionTaskModelMaster {
		return $this->item;
	}

	/**
	 * 更新したミッションタスクマスターを設定
	 *
	 * @param MissionTaskModelMaster|null $item ミッションタスクマスターを更新
	 */
	public function setItem(?MissionTaskModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateMissionTaskModelMasterResult {
        $result = new UpdateMissionTaskModelMasterResult();
        $result->setItem(isset($data["item"]) ? MissionTaskModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}