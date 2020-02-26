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
use Gs2\Stamina\Model\RecoverValueTableMaster;

/**
 * スタミナ回復量テーブルマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRecoverValueTableMasterResult implements IResult {
	/** @var RecoverValueTableMaster 更新したスタミナ回復量テーブルマスター */
	private $item;

	/**
	 * 更新したスタミナ回復量テーブルマスターを取得
	 *
	 * @return RecoverValueTableMaster|null スタミナ回復量テーブルマスターを更新
	 */
	public function getItem(): ?RecoverValueTableMaster {
		return $this->item;
	}

	/**
	 * 更新したスタミナ回復量テーブルマスターを設定
	 *
	 * @param RecoverValueTableMaster|null $item スタミナ回復量テーブルマスターを更新
	 */
	public function setItem(?RecoverValueTableMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateRecoverValueTableMasterResult {
        $result = new UpdateRecoverValueTableMasterResult();
        $result->setItem(isset($data["item"]) ? RecoverValueTableMaster::fromJson($data["item"]) : null);
        return $result;
    }
}