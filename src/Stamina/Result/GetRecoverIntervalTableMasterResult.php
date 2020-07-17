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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\RecoverIntervalTableMaster;

/**
 * スタミナ回復間隔テーブルマスターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRecoverIntervalTableMasterResult implements IResult {
	/** @var RecoverIntervalTableMaster スタミナ回復間隔テーブルマスター */
	private $item;

	/**
	 * スタミナ回復間隔テーブルマスターを取得
	 *
	 * @return RecoverIntervalTableMaster|null スタミナ回復間隔テーブルマスターを取得
	 */
	public function getItem(): ?RecoverIntervalTableMaster {
		return $this->item;
	}

	/**
	 * スタミナ回復間隔テーブルマスターを設定
	 *
	 * @param RecoverIntervalTableMaster|null $item スタミナ回復間隔テーブルマスターを取得
	 */
	public function setItem(?RecoverIntervalTableMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRecoverIntervalTableMasterResult {
        $result = new GetRecoverIntervalTableMasterResult();
        $result->setItem(isset($data["item"]) ? RecoverIntervalTableMaster::fromJson($data["item"]) : null);
        return $result;
    }
}